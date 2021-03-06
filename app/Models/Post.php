<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function simple_post(){
        return $this->hasOne(SimplePost::class);
    }

    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    public function myReaction(){
        return $this->morphMany(Reaction::class, 'reactionable')
                ->where('user_id', Auth::user()->id ?? -1);
    }

    public function getMyReactionAttribute(){
        return $this->myReaction()->first();
    }

    public function comments(){
        return $this->hasMany(PostComment::class);
    }

    public function bestComments(){
        // TODO: hacer query de los comentarios con mas reacciones en order de publicacion
        return $this->hasMany(PostComment::class)->where('gif_url', '!=', null);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function pets(){
        return $this->belongsToMany(Pet::class);
    }
}
