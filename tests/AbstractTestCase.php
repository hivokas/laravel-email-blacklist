<?php

namespace Hivokas\EmailBlacklist\Tests;

use Hivokas\EmailBlacklist\Providers\EmailBlacklistServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class AbstractTestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            EmailBlacklistServiceProvider::class,
        ];
    }
}
