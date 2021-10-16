<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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


    public function setUsernameAttribute($value){
        if(!$value){
            $value = $this->generateUsername();
            while(User::whereUsername($value)->exists()){
                $value = $this->generateUsername();
            }
        }
        
        $this->attributes['username'] = $value;
    }

    private function generateUsername(){
        $result = "user" . dechex(intval(microtime(true))) . dechex(rand());
        return $result;
    }


    public function getUrl(){
        return "/@$this->username";
    }

    public function getAvatarUrl()
    {
        return Storage::url($this->avatar);
    }
}
