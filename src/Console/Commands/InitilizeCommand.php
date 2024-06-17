<?php

namespace Intelrx\Rapidkit\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

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
        $this->info('Installing RapidKit package...');
    }
}
