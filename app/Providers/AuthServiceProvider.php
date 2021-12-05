<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\PostReaction;
use App\Models\Post;
use App\Models\PostComment;
use App\Policies\ImagePolicy;
use App\Policies\PostReactionPolicy;
use App\Policies\PostCommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        PostComment::class => PostCommentPolicy::class,
        Image::class => ImagePolicy::class,
        PostReaction::class => PostReactionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
