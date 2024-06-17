<?php

namespace Intelrx\Rapidkit\Controller;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    public function setup(){
        File::mkdir(app_path('Traits'));
        $stubPath = dirname(__DIR__, 2) . '/src/stubs/config/HasActivityLog.stub';
        $traitPath = app_path('Traits/Activitylog.php');
        $stubContent = File::get($stubPath);
        if (!File::exists($traitPath)) {
            File::put($traitPath, $stubContent);
        }
        
        Artisan::call('vendor:publish', [
            '--provider' => 'Spatie\Activitylog\ActivitylogServiceProvider',
            '--tag' => 'activitylog-migrations'
        ]);
        Artisan::call('migrate');
        Artisan::call("vendor:publish", [
            "--provider" => "Spatie\Activitylog\ActivitylogServiceProvider",
            "--tag" => "activitylog-config"
        ]);
    }
}
