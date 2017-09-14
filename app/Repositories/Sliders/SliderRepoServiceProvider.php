<?php

namespace App\Repositories\Sliders;

use Illuminate\Support\ServiceProvider;

class SliderRepoServiceProvider extends ServiceProvider
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
    	$this->app->bind('App\Repositories\Sliders\SliderRepositoryInterface', 'App\Repositories\Sliders\SliderEloquentRepository');
    }
}