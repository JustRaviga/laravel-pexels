<?php

namespace Tests;

use JustRaviga\Pexels\PexelsServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [PexelsServiceProvider::class];
    }
}
