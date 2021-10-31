<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\ReactionSimplePublication;
use App\Models\SimplePublication;
use App\Policies\ImagePolicy;
use App\Policies\ReactionSimplePublicationPolicy;
use App\Policies\SimplePublicationPolicy;
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
        SimplePublication::class => SimplePublicationPolicy::class,
        Image::class => ImagePolicy::class,
        ReactionSimplePublication::class => ReactionSimplePublicationPolicy::class,
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
