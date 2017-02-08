<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/06
 * Time: 10:56 AM
 */

namespace EONConsulting\Meta;

use Illuminate\Support\ServiceProvider;

class MetaClassificationServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton( 'meta_classification', function () {
            return new MetaClassification;
        });
    }

    public function boot() {
        $this->publishMigrations();
    }

    private function publishMigrations() {
        $path = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'migrations');
    }

    private function getMigrationsPath() {
        return __DIR__ . '/database/migrations/';
    }

}