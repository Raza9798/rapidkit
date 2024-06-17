<?php
namespace Intelrx\Rapidkit\assets;

class Banner 
{
    public function renderTitle($title)
    {
        fwrite(STDERR, "\e[36m============================================================\e[0m\n");
        fwrite(STDERR, "\e[36m$title\e[0m\n");
        fwrite(STDERR, "\e[36m============================================================\e[0m\n");
    }

    public function log($message)
    {
        fwrite(STDERR, "\e[32m$message\e[0m\n");
    }

    public function warn($message)
    {
        fwrite(STDERR, "\e[33m$message\e[0m\n");
    }

    public function error($message)
    {
        fwrite(STDERR, "\e[31m$message\e[0m\n");
    }

    public function line($message)
    {
        fwrite(STDERR, "$message\n");
    }
}