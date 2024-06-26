<?php

namespace Intelrx\Rapidkit\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Intelrx\Rapidkit\assets\Banner;
use Intelrx\Rapidkit\Controller\ActivityController;
use Intelrx\Rapidkit\Controller\BackupController;
use Intelrx\Rapidkit\Controller\BuildController;
use Intelrx\Rapidkit\Controller\ExportController;
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
        (new BackupController())->setup();
        (new BackupController())->configureDatabaseDump();
        (new TelescopeController())->setup();
        (new ActivityController())->setup();
        (new BuildController());
        (new ExportController())->setup();
        Artisan::call("rapid:support");
    }
}
