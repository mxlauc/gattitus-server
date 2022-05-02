<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'user_id',
        'gif_url',
        'post_id',
    ];

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Post that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Post()
    {
        return $this->belongsTo(Post::class);
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
}
