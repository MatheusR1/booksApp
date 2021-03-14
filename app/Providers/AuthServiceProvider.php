<?php

namespace App\Providers;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // difino aqui as ações que cada user pode fazer, na function de callback
        $this->registerPolicies();

        //gate para user admin

        Gate::define('administrador', function ($user) {
            return $user->type == 'administrador';
        });

        //gate para user normal

        Gate::define('normal', function ($user) {
            return $user->type == 'normal';
        });
    }
}
