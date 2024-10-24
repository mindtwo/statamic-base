<?php

namespace mindtwo\StatamicBase;

use mindtwo\StatamicBase\Commands\StatamicBaseInstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StatamicBaseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('statamic-base')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(StatamicBaseInstallCommand::class);
    }
}
