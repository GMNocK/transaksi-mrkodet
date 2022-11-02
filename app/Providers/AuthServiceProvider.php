<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        Paginator::useBootstrap();

        $this->registerPolicies();

        Gate::define('mustBeAdmin', function (User $user)
        {
            return $user->level == 'Admin';
        });

        Gate::define('costumer', function (User $user){
            return $user->level == 'costumer';
        });
        
        Gate::define('karyawan', function (User $user){
            return $user->level == 'karyawan';
        });
    }
}
