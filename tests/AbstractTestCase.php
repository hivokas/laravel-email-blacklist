<?php

namespace Hivokas\EmailBlackList\Tests;

use Hivokas\EmailBlackList\Providers\EmailBlacklistServiceProvider;
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
