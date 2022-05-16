<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\Image;
use Optix\Media\Facades\Conversion;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        //
        Paginator::useBootstrap();

        Conversion::register('house', function (Image $image) {
            return $image->fit(1000, 800);
        });

        Conversion::register('avatar', function (Image $image) {
            return $image->fit(160, 160);
        });

        Conversion::register('thumb', function (Image $image) {
            return $image->fit(64, 64);
        });

    }
}
