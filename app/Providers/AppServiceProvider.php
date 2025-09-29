<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Participation;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       View::composer('*', function ($view) {
        if (auth()->check()) {
            $participations = auth()->user()
                ->participations()
                ->with('challenge', 'challenge.creator')
                ->get();
        } else {
            $participations = collect();
        }

        $view->with('participations', $participations);
    });
    }
}
