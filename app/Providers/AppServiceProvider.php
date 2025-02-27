<?php

namespace App\Providers;

use App\Interfaces\ProductoInterface; // Importa la interfaz
use App\Repositories\ProductoRepository; // Importa el repositorio
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProductoInterface::class, ProductoRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
