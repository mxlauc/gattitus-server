<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'directory',
        'url_xl',
        'url_lg',
        'url_md',
        'url_sm',
        'url_xs',
        'meta_data',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
