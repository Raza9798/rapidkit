<?php

namespace Intelrx\Rapidkit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Intelrx\Rapidkit\assets\Banner;
use Intelrx\Rapidkit\Config\Config;
use Intelrx\Rapidkit\Console\Commands\InitilizeCommand;
use Intelrx\Rapidkit\Console\Commands\ResourceGeneratorCommand;
use Intelrx\Rapidkit\Console\Commands\RapidKitSupportCommand;

class RapidKitProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ResourceGeneratorCommand::class,
                InitilizeCommand::class,
                RapidKitSupportCommand::class,
            ]);

            (new Banner())->renderTitle('RapidKit is ready to use!');
            (new Banner())->line("LARAVEL RAPID KIT " . Config::VERSION);
            (new Banner())->line("Type 'php artisan rapid:install' to install and configure RapidKit package.");
        }


    }
}
