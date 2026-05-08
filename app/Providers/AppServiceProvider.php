<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // 👈 1. Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 👈 2. Tambahkan pelindung ini
        // Jika aplikasi berjalan di server (production), paksa pakai HTTPS
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}