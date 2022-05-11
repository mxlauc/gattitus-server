<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reactionable_type',
        'reactionable_id',
        'reaction_type_id',
        'user_id',
    ];

    public function reactionable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reactionType(){
        return $this->belongsTo(ReactionType::class);
    }
}
