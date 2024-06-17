<?php

namespace Intelrx\Rapidkit\Controller;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Intelrx\Rapidkit\assets\Banner;

class ActivityController extends Controller
{
    public function setup(){
        $this->createTraitsDirectory();
        $this->createActivityLogTrait();
        $this->publishActivityLogAssets();
        $this->runActivityLoggerMigrations();
        
    }

    protected function createTraitsDirectory(){
        $dir = app_path('Traits');
        if (!File::exists($dir)) {
            File::makeDirectory($dir);
        }
        else{
            (new Banner())->warn('Traits directory already exists');
        }
    }

    protected function createActivityLogTrait(){
        $stubPath = dirname(__DIR__, 2) . '/src/stubs/traits/HasActivityLog.stub';
        $traitPath = app_path('Traits/HasActivityLog.php');
        $stubContent = File::get($stubPath);
        if (!File::exists($traitPath)) {
            File::put($traitPath, $stubContent);
        }
        else{
            (new Banner())->warn('HasActivityLog trait already exists');
        }
    }

    protected function publishActivityLogAssets(){
        Artisan::call('vendor:publish', [
            '--provider' => 'Spatie\Activitylog\ActivitylogServiceProvider',
            '--tag' => 'activitylog-migrations'
        ]);
        Artisan::call("vendor:publish", [
            "--provider" => "Spatie\Activitylog\ActivitylogServiceProvider",
            "--tag" => "activitylog-config"
        ]);
    }

    protected function runActivityLoggerMigrations(){
        Artisan::call('migrate');
    }
}
