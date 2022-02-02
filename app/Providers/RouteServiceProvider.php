<?php

namespace App\Providers;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModeliController;
use App\Http\Controllers\WelcomeController;
use App\Models\Modeli;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            Route::get('', [WelcomeController::class, 'index']);
            Route::get('new', [WelcomeController::class, 'new']);
            Route::get('search', [WelcomeController::class, 'search']);
            Route::get('list', [WelcomeController::class, 'list']);
            Route::get('list/search', [WelcomeController::class, 'list_search']);

            Route::get('list/view/{id}', [WelcomeController::class, 'auto_red_form'])->name('auto_red_form');
            Route::post('list/view/{id}/update', [WelcomeController::class, 'auto_update'])->name('auto_update');

            Route::get('brand-all', [BrandController::class, 'index'])->name('brand_all');
            Route::get('brand_get', [BrandController::class, 'brand_get'])->name('brand_get');
            Route::get('brand_json', [BrandController::class, 'brand_json']);
            Route::get('brand_json/{count}', [BrandController::class, 'brand_json'])->name('brand_json');
            Route::get('brand-search', [BrandController::class, 'brand_search'])->name('brand_search');
            Route::get('ajax_brand', [BrandController::class, 'ajax_brand'])->name('ajax_brand');
            Route::get('ajax_model', [BrandController::class, 'ajax_model'])->name('ajax_model');


            Route::get('model', [ModeliController::class, 'index']);
            Route::get('model/{Make_ID}', [ModeliController::class, 'index'])->name('model');
            Route::get('model_get/{Make_ID}', [ModeliController::class, 'model_get']);

            /**
             * 
             * 
             * 
             */

            Route::prefix('api/V1')
                ->middleware('api')
                ->namespace($this->namespace . '\\Api\\V1')
                ->group(base_path('routes/api.php'));

            /*
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
             */
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
