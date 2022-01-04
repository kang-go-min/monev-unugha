<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $appUrl = config('app.url');
        if ($appUrl) {
            $isHttps = (strpos($appUrl, 'https://') === 0);
            URL::forceRootUrl($appUrl);
            URL::forceScheme($isHttps ? 'https' : 'http');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        setlocale(LC_TIME, 'Indonesia');

        date_default_timezone_set(config('app.timezone'));
        \Carbon\Carbon::setLocale('id');

    }
}
