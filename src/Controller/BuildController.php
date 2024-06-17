<?php

namespace Intelrx\Rapidkit\Controller;
use Illuminate\Routing\Controller;

class BuildController extends Controller
{
    private $app_name;
    public function __construct($app_name = null) {
        $this->$app_name = $app_name;
        dd($this->$app_name);
    }
}
