<?php
namespace Intelrx\Rapidkit\Config;
use Carbon\Carbon;

class Config
{
    const VERSION = '1.8.12';
    const ASSETS_DIR = "/src/assets";

    public static function getBuildDir($levels): string
    {
        return dirname(__DIR__, $levels) . Config::ASSETS_DIR ."/build/". Carbon::now()->format('Y-m-d-H-i-s');
    }

    public static function getBuildHash($levels = 2): string
    {
        return dirname(__DIR__, $levels) . Config::ASSETS_DIR ."/build/build_backup.hash";
    }
}