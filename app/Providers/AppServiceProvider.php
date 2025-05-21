<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureCommands();
        $this->configureModels();
        $this->configureUrl();
    }

    private function configureCommands()
    {
        DB::prohibitDestructiveCommands(
            app()->environment('production'),
        );
    }

    private function configureModels()
    {
        Model::shouldBeStrict();

        Model::unguard();
    }

    private function configureUrl()
    {
        //URL::forceScheme('https');
    }
}
