<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SimplePost extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image_id',
        'post_id',
    ];

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
