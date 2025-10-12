<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Participation;
use Illuminate\Pagination\Paginator;


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
        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $participations = $user->participations()
                ->with('challenge', 'challenge.creator')
                ->get();
        } else {
            $participations = collect();
        }

        $view->with('participations', $participations);
    });

        Paginator::useBootstrap();

    }
}
