<?php

namespace Sohagpro\Interstellar;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class InterstellarServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->loadViewsFrom( __DIR__ . '/../resources/views', 'interstellar' );
        $this->registerRoutes();

        $this->publishes( [
            __DIR__ . '/../config/interstellar.php' => config_path( 'interstellar.php' ),
        ], 'interstellar-config' );
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes() {
        Route::group( $this->routeConfiguration(), function () {
            $this->loadRoutesFrom( __DIR__ . '/../routes/web.php' );
        } );
    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration() {
        return [
            'prefix'     => config( 'interstellar.path', 'interstellar' ),
            'as'         => 'interstellar.',
            'middleware' => config( 'interstellar.middleware' ),
        ];
    }
}