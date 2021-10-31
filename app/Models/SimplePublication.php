<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Reaction::class)->using(ReactionSimplePublication::class)->withTimestamps();
    }
}
