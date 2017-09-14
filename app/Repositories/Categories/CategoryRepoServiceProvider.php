<?php

namespace App\Repositories\Categories;

use Illuminate\Support\ServiceProvider;

class CategoryRepoServiceProvider extends ServiceProvider
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
    	$this->app->bind('App\Repositories\Categories\CategoryRepositoryInterface', 'App\Repositories\Categories\CategoryEloquentRepository');
    }
}