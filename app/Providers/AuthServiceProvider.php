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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->registerPolicies();

        Gate::define('manage.users',function($user){
            return $user->hasRole('admin');
        });
        // Gate::define('edit.users',function($user){
        //     return $user->hasRole('admin');
        // });
        Gate::define('create.blogs',function($user){
            return $user->hasRole('clinic') or $user->hasRole('admin') or $user->hasRole('blogs_admin') ;
        });
        // Gate::define('manage_blogs',function($user){
        //     return $user->hasAnyRoles(['blogs_admin','admin']);
        // });
        // Gate::define('manage_doctors',function($user){
        //     return $user->hasAnyRoles(['doctors_admin','admin']);
        // });
        // Gate::define('manage_clinics',function($user){
        //     return $user->hasAnyRoles(['clinics_admin','admin']);
        // });
    }
}
