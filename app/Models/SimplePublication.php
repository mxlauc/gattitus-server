<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SimplePublication extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'user_id',
        'image_id',
    ];

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reactions(){
        return $this->belongsToMany(Reaction::class)
                ->using(ReactionSimplePublication::class)
                ->withTimestamps();
    }

    public function myReaction(){
        return $this->belongsToMany(Reaction::class)
                ->using(ReactionSimplePublication::class)
                ->withTimestamps()
                ->wherePivot('user_id', Auth::user()->id ?? -1);
    }

    public function getMyReactionAttribute(){
        return $this->myReaction()->first();
    }

    public function getOwnReactionAttribute(){
        return $this->reactions()->where('reactions.id', '>', 0)->first() ?? null;
    }

    public function comments(){
        return $this->hasMany(SimplePublicationComment::class);
    }
}
