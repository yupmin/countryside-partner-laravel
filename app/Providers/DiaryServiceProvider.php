<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class DiaryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\DiaryInterface', 'App\Services\MentorDiaryService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
