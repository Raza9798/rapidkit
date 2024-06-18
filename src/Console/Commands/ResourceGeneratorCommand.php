<?php

namespace Intelrx\Rapidkit\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Intelrx\Rapidkit\Controller\BuildController;

class ResourceGeneratorCommand extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rapid:make {name} {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new module with controller and model resources. {--path=} is optional.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->option('path');

        $name = Str::ucfirst($name);
        if ($path != null) {
            $this->info("Creating module resources inside: {$path}/{$name}");
            Artisan::call("make:controller {$path}/{$name}Controller --resource");
            Artisan::call("make:model {$path}/{$name} -fms");
            Artisan::call("make:view {$path}/{$name}");
        }
        else{
            $this->info("Creating module resources for {$name}");
            Artisan::call("make:controller {$name}Controller --resource");
            Artisan::call("make:model $name -fms");
            Artisan::call("make:view {$name}");

        }
        $this->warn('Module command executed successfully!');
        (new BuildController());
    }
}
