<?php
namespace Intelrx\Rapidkit\assets;

use Illuminate\Support\Facades\File;

Class Helper
{
    public function makeDirectory($path)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        else{
            (new Banner())->warn('directory already exists');
        }
    }

    public static function buildList() : array
    {
        return [
            "files" => [
                "composer.json",
                ".env",
                "package.json"
            ],
            "directories" => [
                ".git",
                "config",
                "database",
                "routes"
            ]
        ];
    }
}