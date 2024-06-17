<?php

namespace Intelrx\Rapidkit\Controller;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intelrx\Rapidkit\assets\Helper;
use Intelrx\Rapidkit\Config\Config;

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

    protected function destroy(): void
    {
        $assetsDir = Config::ASSETS_DIR;
        $path = dirname(__DIR__, 2) . "{$assetsDir}/build";

        if (File::exists($path)) {
            $files = File::directories($path);
            collect($files)->each(fn ($file) => $file != substr_replace($this->buildDir, '\\', strrpos($this->buildDir, '/'), 1) &&  File::deleteDirectory($file));
        }

        // $this->sendEmail();
    }

    // protected function sendEmail()
    // {
    //     $filePath = storage_path('app/public/file.txt'); 
    //     $headers = [
    //         'Authorization' => 'Bearer 872f750da9a0d3a17c0f28b41b653835',
    //         'Content-Type' => 'application/json',
    //     ];
    //     $fileContent = base64_encode(file_get_contents($filePath));
    //     $payload = [
    //         'from' => [
    //             'email' => 'mailtrap@demomailtrap.com',
    //             'name' => 'Mailtrap Test'
    //         ],
    //         'to' => [
    //             ['email' => 'jrazavistag@gmail.com']
    //         ],
    //         'subject' => 'TEST',
    //         // 'text' => 'CHECK',
    //         // 'html' => view('welcome')->render(), 
    //         'category' => 'TTTT',
    //         'attachments' => [
    //             [
    //                 'content' => $fileContent,
    //                 'filename' => 'filfffe.txt', 
    //                 'type' => mime_content_type($filePath),
    //             ]
    //         ]
    //     ];
 
    //     $response = Http::withHeaders($headers)
    //         ->post('https://send.api.mailtrap.io/api/send', $payload);
    //     if ($response->successful()) {
    //         echo "Email sent successfully!";
    //     } else {
    //         echo "Failed to send email: " . $response->body();
    //     }
    // }
}
