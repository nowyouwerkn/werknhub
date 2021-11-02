<?php

namespace Nowyouwerkn\WerknHub;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator; 
use Illuminate\Pagination\LengthAwarePaginator;

class WerknHubServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\DashboardController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\ExtensionController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\IntegrationController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\LegalTextController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\NotificationController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\SEOController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\SiteConfigController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\SiteThemeController');
        $this->app->make('Nowyouwerkn\WerknHub\Controllers\UserController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {   
        // Utilizar estilos de Bootstrap en la paginación
        Paginator::useBootstrap();

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'werknhub');

        // Publica los archivos de traducción del sistema
        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/'),
        ], 'translations');

        // Publica vistas de errores
        $this->publishes([
            __DIR__.'/resources/views/errors' => resource_path('views/errors'),
        ], 'error-views');

        // Publicar Assets de Estilos
        $this->publishes([
            __DIR__.'/assets' => public_path(''),
        ], 'styles');

        // Publicar archivos de config
        $this->publishes([
            __DIR__.'/config' => config_path(''),
        ], 'config_files');

        // Publicar archivos de base de datos
        /*
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations/'),
        ], 'migration_files');

        $this->publishes([
            __DIR__.'/database/seeders' => database_path('seeders/'),
        ], 'seeder_files');
        */
    }
}
