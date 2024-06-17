<?php

namespace Intelrx\Rapidkit\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Intelrx\Rapidkit\assets\Banner;
use Intelrx\Rapidkit\Controller\BackupController;
use Intelrx\Rapidkit\Controller\TelescopeController;

class InitilizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rapid:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install and configure RapidKit package.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new Banner())->renderTitle('Installing and configuring RapidKit package...');
       
        Artisan::call("vendor:publish", [
            "--provider" => "Spatie\Backup\BackupServiceProvider"
        ]);

        (new BackupController())->configureDatabaseDump();
        (new TelescopeController())->setup();
        Artisan::call("rapid:support");
    }
}
