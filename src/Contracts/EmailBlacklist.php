<?php

namespace Hivokas\EmailBlacklist\Contracts;

interface EmailBlacklist
{
    public function all(): array;

    public function count(): int;

    public function exists(string $email): bool;

    public function add(string $email): void;

    public function remove(string $email): void;

    public function validate(string $email): void;
}
