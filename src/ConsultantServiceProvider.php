<?php

namespace TresPontosTech\Consultant;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ConsultantServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-consultants-module')
            ->hasConfigFile()
            ->hasViews()
            ->discoversMigrations();
    }
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-consultants-module');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publish();
    }

    private function publish(): void
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'filament-consultants-module-migrations');

        $this->publishes([
            __DIR__.'/../config/filament-consultants-module.php' => config_path('filament-consultants-module.php'),
        ], 'filament-consultants-module-config');
    }
}
