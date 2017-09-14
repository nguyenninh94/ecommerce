<?php

namespace App\Repositories\Sizes;

use Illuminate\Support\ServiceProvider;

class SizeRepoServiceProvider extends ServiceProvider
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
    	$this->app->bind('App\Repositories\Sizes\SizeRepositoryInterface', 'App\Repositories\Sizes\SizeEloquentRepository');
    }
}