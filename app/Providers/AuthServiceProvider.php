<?php

namespace App\Providers;

use App\Models\Emotion;
use App\Models\User;
use App\Policies\EmotionPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('update-emotion', function (User $user, Emotion $emotion) {
//            return $user->id === $emotion->user_id;
//        });
        Gate::define('update-emotion', [EmotionPolicy::class, 'update']);
        Gate::define('restore-emotion', [EmotionPolicy::class, 'restore']);
        Gate::define('create-emotion', [EmotionPolicy::class, 'create']);
        Gate::define('destroy-emotion', [EmotionPolicy::class, 'delete']);
        Gate::define('store-emotion', [EmotionPolicy::class, 'restore']);




        Gate::define('update-post', [PostPolicy::class, 'update']);
        Gate::define('restore-post', [PostPolicy::class, 'restore']);
        Gate::define('create-post', [PostPolicy::class, 'create']);
        Gate::define('destroy-post', [PostPolicy::class, 'delete']);
        Gate::define('store-post', [PostPolicy::class, 'restore']);

        Passport ::routes(); // Add this

        //
    }
}
