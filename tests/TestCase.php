<?php

namespace mindtwo\StatamicBase\Tests;

use mindtwo\StatamicBase\AddonServiceProvider;
use mindtwo\StatamicBase\StatamicBaseServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            StatamicBaseServiceProvider::class,
            AddonServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
