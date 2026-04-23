<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\View::composer(['layouts.frontend', 'components.frontend.*', 'pages.*'], function ($view) {
            $view->with([
                'headerMenus' => \App\Models\Menu::header()->with('children')->get(),
                'footerMenus' => \App\Models\Menu::footer()->with('children')->get(),
            ]);
        });
    }
}
