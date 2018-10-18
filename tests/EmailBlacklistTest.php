<?php

namespace Hivokas\EmailBlacklist\Tests;

use Hivokas\EmailBlacklist\EmailBlacklist;
use InvalidArgumentException;

class EmailBlacklistTest extends AbstractTestCase
{
    public function test_validate_method_with_invalid_email()
    {
        $this->expectExceptionMessage('Specified email is invalid.');

        $this->expectException(InvalidArgumentException::class);

        (new EmailBlacklist)
            ->validate('I am not email');
    }

    public function test_validate_method_with_valid_email()
    {
        (new EmailBlacklist)
            ->validate('me@hivokas.com');

        $this->addToAssertionCount(1);
    }
}