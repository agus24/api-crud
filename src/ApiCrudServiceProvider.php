<?php

namespace ApiCrud\ApiCrud;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ApiCrud\ApiCrud\Commands\ApiCrudCommand;

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
