<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Gate;


use App\Policies\PostPolicy;
use App\Models\Post;
use App\Policies\CategoryPolicy;
use App\Models\Category;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        // Gate::define('create-post', function (User $user, Post $post) {
        //     return $user->role === 1;//Admin
        // });

        // Gate::define('update-post', function (User $user, Post $post) {
        //     return $user->role === 1;
        // });
    }
}
