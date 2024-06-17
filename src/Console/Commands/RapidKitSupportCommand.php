<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $this->info('Welcome to Laravel Rapid Kit Support!');
    }
}
