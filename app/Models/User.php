<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'avatar',
        'facebook_id',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function isAdmin() {
        return $this->role->name === "Administrador";
    }

    public function punishments(){
        return $this->hasMany(Punishment::class);
    }

    public function setUsernameAttribute($value){
        if(!$value){
            $contador = 1;
            $value = $this->generateUsername($contador);
            while(User::whereUsername($value)->exists()){
                $value = $this->generateUsername($contador);
                $contador++;
            }
        }
        
        $this->attributes['username'] = $value;
    }

    private function generateUsername($num = 0){
        $name = $this->attributes['name'];
        $name = mb_strtolower($name);
        $name = str_replace("ñ", "n", $name);
        $name = str_replace(".", " ", $name);

        $words = str_split("abcdefghijklmnopqrstuvwxyz ");
        $new_name = "";

        foreach(str_split($name) as $c){
            if(in_array($c, $words)){
                $new_name .= $c;
            }
        }

        $new_name = str_replace(" ", ".", trim($new_name));
        $new_name = preg_replace('/\.+/', '.', $new_name);
        if(strlen($new_name) > 15){
            $new_name = substr($new_name, 0, 15);
        }

        return $new_name . $num;
    }


    public function getUrl(){
        return "/@$this->username";
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

    /**
     * The followers that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_user', 'followed_id', 'follower_id');
    }

    /**
     * The followed that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followeds()
    {
        return $this->belongsToMany(User::class, 'user_user', 'follower_id', 'followed_id');
    }

    public function myFollow(){
        return $this->belongsToMany(User::class, 'user_user', 'followed_id', 'follower_id')
                ->wherePivot('follower_id', Auth::user()->id ?? -1);
    }

    public function cats(){
        return $this->hasMany(Cat::class);
    }

}
