<?php

namespace Intelrx\Rapidkit\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class ExportController extends Controller
{
    public function setup(){
        Artisan::call("vendor:publish", [
            "--provider" => "Maatwebsite\Excel\ExcelServiceProvider",
            "--tag" => "config"
        ]);
    }
}
