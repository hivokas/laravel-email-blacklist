<?php

namespace Hivokas\EmailBlacklist;

use Hivokas\EmailBlacklist\Contracts\EmailBlacklist as EmailBlacklistContract;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class EmailBlacklist implements EmailBlacklistContract
{
    /** @var Model */
    protected $model;

    public function __construct()
    {
        $modelClassName = config('email_blacklist.model');

        $this->model = new $modelClassName;
    }

    public function all(): array
    {
        return $this->model
            ->pluck('email')
            ->toArray();
    }

    public function count(): int
    {
        return $this->model
            ->count();
    }

    public function exists(string $email): bool
    {
        $this->validate($email);

        return $this->model
            ->where('email', $email)
            ->exists();
    }

    public function add(string $email): void
    {
        $this->validate($email);

        $this->model
            ->updateOrCreate([
                'email' => $email,
            ]);
    }

    public function remove(string $email): void
    {
        $this->validate($email);

        $blacklistedEmail = $this->model
            ->where('email', $email)
            ->first();

        if ($blacklistedEmail) {
            $blacklistedEmail->delete();
        }
    }

    public function validate(string $email): void
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                'Specified email is invalid.'
            );
        }
    }
}
