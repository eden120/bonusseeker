<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use PaginateRoute;

class RouteServiceProvider extends ServiceProvider {
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot() {
        PaginateRoute::registerMacros();

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map() {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAnalystRoutes();

        $this->mapEditorRoutes();

        $this->mapSeoRoutes();

        $this->mapUserRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes() {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix'     => '/app/admin',
            'as'         => 'admin.',
            'namespace'  => $this->namespace,
        ], function($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "user" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapUserRoutes() {
        Route::group([
            'middleware' => ['web', 'user', 'auth:user'],
            'prefix'     => 'user',
            'as'         => 'user.',
            'namespace'  => $this->namespace,
        ], function($router) {
            require base_path('routes/user.php');
        });
    }

    /**
     * Define the "seo" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSeoRoutes() {
        Route::group([
            'middleware' => ['web', 'seo', 'auth:seo'],
            'prefix'     => 'seo',
            'as'         => 'seo.',
            'namespace'  => $this->namespace,
        ], function($router) {
            require base_path('routes/seo.php');
        });
    }

    /**
     * Define the "editor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapEditorRoutes() {
        Route::group([
            'middleware' => ['web', 'editor', 'auth:editor'],
            'prefix'     => 'editor',
            'as'         => 'editor.',
            'namespace'  => $this->namespace,
        ], function($router) {
            require base_path('routes/editor.php');
        });
    }

    /**
     * Define the "analyst" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAnalystRoutes() {
        Route::group([
            'middleware' => ['web', 'analyst', 'auth:analyst'],
            'prefix'     => 'analyst',
            'as'         => 'analyst.',
            'namespace'  => $this->namespace,
        ], function($router) {
            require base_path('routes/analyst.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes() {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes() {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
