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
}
