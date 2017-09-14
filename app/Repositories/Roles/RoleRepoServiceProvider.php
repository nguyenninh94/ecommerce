<?php

namespace App\Repositories\Roles;

use Illuminate\Support\ServiceProvider;

class RoleRepoServiceProvider extends ServiceProvider
{
	 /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	$this->app->bind('App\Repositories\Roles\RoleRepositoryInterface', 'App\Repositories\Roles\RoleEloquentRepository');
    }
}