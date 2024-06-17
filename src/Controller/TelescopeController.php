<?php

namespace Intelrx\Rapidkit\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TelescopeController extends Controller
{
    public function setup(){
        // Artisan::call('telescope:install');
        Artisan::call('migrate');
    }
}
