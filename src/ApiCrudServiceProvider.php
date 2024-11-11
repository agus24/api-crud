<?php

namespace ApiCrud\ApiCrud;

use ApiCrud\ApiCrud\Commands\ApiCrudCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ApiCrudServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('api-crud')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_api_crud_table')
            ->hasCommand(ApiCrudCommand::class);
    }
}
