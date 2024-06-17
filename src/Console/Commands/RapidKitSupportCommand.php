<?php

namespace Intelrx\Rapidkit\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Intelrx\Rapidkit\assets\Banner;
use Intelrx\Rapidkit\Config\Config;

class RapidKitSupportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rapid:support';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Rapid Kit Support';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new Banner())->renderTitle('Welcome to Laravel Rapid Kit Support!');
        (new Banner())->line("LARAVEL RAPID KIT " . Config::VERSION);
        
        Artisan::call('list rapid');
        $output = Artisan::output();
        (new Banner())->log($output);

    }
}
