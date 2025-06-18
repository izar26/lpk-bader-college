<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; // <-- PENTING: Import class View
use Illuminate\Support\ServiceProvider;
use App\Models\Profil;                  // <-- Import model Profil
use App\Models\Kontak;                 // <-- Import model Kontak

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
        // Kode ini akan berjalan setiap kali ada halaman yang dibuka
        // dan akan "membagikan" variabel ini ke semua view.
        // Ini adalah cara yang efisien agar tidak perlu mengambil data yang sama di setiap controller.
        View::composer('*', function ($view) {
            $view->with('siteProfil', Profil::first());
            $view->with('siteKontak', Kontak::first());
        });
    }
}