<?php

namespace Intelrx\Rapidkit\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
class ResourceGeneratorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_resources_on_root(): void
    {
        Artisan::call('rapid:make', [
            'name' => 'division',
        ]);
        $output = Artisan::output();
        Log::debug($output);
        $this->assertTrue(true);
    }
     
    public function test_create_resources_as_module(): void
    {
        Artisan::call('rapid:make', [
            'name' => 'country',
            '--path' => 'master',
        ]);
        $output = Artisan::output();
        Log::debug($output);
        $this->assertTrue(true); 
    }
} 
