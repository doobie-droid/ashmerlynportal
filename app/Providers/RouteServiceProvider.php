<?php

namespace App\Providers;

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
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web','auth','role:administrator'])
                ->group(base_path('routes/roles/routes.php'));

            Route::middleware(['web','auth',])
                ->group(base_path('routes/users/routes.php'));

            Route::middleware(['web','auth','role:administrator'])
                ->group(base_path('routes/admin/routes.php'));

            Route::middleware(['web','auth','role:administrator'])
                ->group(base_path('routes/subjects/routes.php'));

            Route::middleware(['web','auth','role:administrator'])
                ->group(base_path('routes/years/routes.php'));

            Route::middleware(['web','auth','role:administrator'])
                ->group(base_path('routes/arms/routes.php'));
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
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
