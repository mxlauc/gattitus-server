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
        return $this->belongsToMany(Reaction::class)
                ->using(PostReaction::class)
                ->withTimestamps();
    }

    public function myReaction(){
        return $this->belongsToMany(Reaction::class)
                ->using(PostReaction::class)
                ->withTimestamps()
                ->wherePivot('user_id', Auth::user()->id ?? -1);
    }

    public function getMyReactionAttribute(){
        return $this->myReaction()->first();
    }

    public function getOwnReactionAttribute(){
        return $this->reactions()->where('reactions.id', '>', 0)->first() ?? null;
    }

    public function bestComments(){
        // TODO: hacer query de los comentarios con mas reacciones en order de publicacion
        return $this->hasMany(PostComment::class)->where('gif_url', '!=', null);
    }
}
