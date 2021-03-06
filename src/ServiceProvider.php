<?php

namespace Trianity\LaravelLogReader;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/laravel-log-reader.php';
    const ROUTE_PATH = __DIR__ . '/../routes';
    const VIEW_PATH = __DIR__ . '/../views';
    const ASSET_PATH = __DIR__ . '/../assets';
    const LANG_PATH = __DIR__ . '/../resources/lang';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('laravel-log-reader.php'),
        ], 'config');
        $this->publishes([
            self::LANG_PATH => resource_path('lang'),
        ]);
        $this->loadRoutesFrom(self::ROUTE_PATH . '/web.php');
        $this->loadViewsFrom(self::VIEW_PATH, 'LaravelLogReader');
        $this->loadTranslationsFrom(self::LANG_PATH, 'LaravelLogReader');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'laravel-log-reader'
        );
    }
}
