<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Share menu navbar ke layout navbar
        View::composer('layouts.partials.header', function ($view) {

            $menus = [
                [
                    'title' => 'Beranda',
                    'route' => 'home',
                ],
                [
                    'title' => 'Tentang',
                    'url'   => '/penjelasan',
                ],
                [
                    'title' => 'Pelayanan',
                    'url'   => '/pelayanan',
                ],
                [
                    'title' => 'Dokter',
                    'dropdown' => [
                        ['title' => 'Dokter', 'url' => '/dokter'],
                        ['title' => 'Appointment', 'url' => '/appointment'],
                    ],
                ],
                [
                    'title' => 'Blog',
                    'dropdown' => [
                        ['title' => 'Blog', 'url' => '/blog'],
                    ],
                ],
                [
                    'title' => 'Kontak',
                    'url'   => '/kontak',
                ],
            ];

            $view->with('menus', $menus);
        });
    }
}
