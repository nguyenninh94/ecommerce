<?php

namespace App\Repositories\Colors;

use Illuminate\Support\ServiceProvider;

class ColorRepoServiceProvider extends ServiceProvider
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
    	$this->app->bind('App\Repositories\Colors\ColorRepositoryInterface', 'App\Repositories\Colors\ColorEloquentRepository');
    }
}