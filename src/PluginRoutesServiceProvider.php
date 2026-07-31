<?php

namespace AntonioSugamele\PluginRoutes;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PluginRoutesServiceProvider extends  ServiceProvider
{

    /**
     * Eseguito quando Laravel avvia tutti i servizi.
     */
    public function boot(): void
    {
        // 1. Indichi dove si trovano le viste Blade del tuo pacchetto
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'plugin-routes');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/css' => public_path('vendor/plugin-routes/css'),
            ], 'plugin-routes-assets');
        }

        // 2. Registri la rotta del tuo pacchetto
        // In alternativa puoi anche caricare un file esterno con:
        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        Route::middleware(['web'])->group(function () {
            Route::get('/routes-viewer', Controllers\RouteViewerController::class)
                ->name('plugin-routes.index');
        });
    }

    /**
     * Utilizzato per registrare binding nel service container (opzionale per ora).
     */
    public function register(): void
    {
        //
    }
}