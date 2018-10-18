<?php

namespace Hivokas\EmailBlacklist\Facades;

use Illuminate\Support\Facades\Facade;

class EmailBlacklist extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'email_blacklist';
    }
}
