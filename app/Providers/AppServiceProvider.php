<?php

namespace App\Providers;

use App\Services\DiaryInterface;
use App\Services\MenteeInterface;
use App\Services\MenteeService;
use App\Services\MentorDiaryService;
use App\Services\MentorInterface;
use App\Services\MentorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    public $bindings = [

        MentorInterface::class      => MentorService::class,
        MenteeInterface::class      => MenteeService::class,
        DiaryInterface::class       => MentorDiaryService::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }


        $this->app->register(ResponseMacroServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
