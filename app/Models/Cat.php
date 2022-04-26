<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'slug',
        'image_id',
        'user_id',
    ];

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
