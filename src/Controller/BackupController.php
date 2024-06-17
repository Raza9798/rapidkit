<?php

namespace Intelrx\Rapidkit\Controller;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Intelrx\Rapidkit\assets\Banner;

class BackupController extends Controller
{
    public function setup(){
        Artisan::call("vendor:publish", [
            "--provider" => "Spatie\Backup\BackupServiceProvider"
        ]);
    }

    public function configureDatabaseDump(){
        if (!File::exists(config_path('database.php'))) {
            (new Banner())->error('Database Config file does not exist');
            return;
        }
        $stubPath = dirname(__DIR__, 2) . '/src/stubs/config/backupDatabaseConfig.stub';;

        $configPath = config_path('database.php');
        $stubContent = File::get($stubPath);

        $configContent = File::get($configPath);
        if (strpos($configContent, "'dump'") === false) {
            $newConfigContent = preg_replace(
                "/('mysql' => \[.*?)(\s+\],)/s",
                "$1\n    {$stubContent}$2",
                $configContent
            );

            if (File::put($configPath, $newConfigContent)) {
                (new Banner())->log('Backup configuration updated for MySql');
            } else {
                (new Banner())->error('Failed to update config file');
            }
        } 
    }
}
