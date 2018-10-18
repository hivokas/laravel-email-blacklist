# Laravel Email Blacklist

Handy email blacklist management for Laravel.

## Installation

You can install this package via composer using this command:

```bash
composer require hivokas/laravel-email-blacklist
```

The package will automatically register itself.

You can publish the migration with:

```bash
php artisan vendor:publish --provider="Hivokas\EmailBlacklist\Providers\EmailBlacklistServiceProvider" --tag="migrations"
```

After the migration has been published you can create the table for blacklisted emails by running the migrations:

```bash
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Hivokas\EmailBlacklist\Providers\EmailBlacklistServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Table Name For Email Blacklist Storing
    |--------------------------------------------------------------------------
    */
    'table_name' => 'blacklisted_emails',

    /*
    |--------------------------------------------------------------------------
    | BlacklistedEmail Model
    |--------------------------------------------------------------------------
    */
    'model' => \Hivokas\EmailBlacklist\Models\BlacklistedEmail::class,

];
```

## Examples of use

```php
use Hivokas\EmailBlacklist\Facades\EmailBlacklist;

EmailBlacklist::add('me@hivokas.com');

EmailBlacklist::count(); // 1

EmailBlacklist::all(); // ['me@hivokas.com']

EmailBlacklist::exists('me@hivokas.com'); // true

EmailBlacklist::remove('me@hivokas.com');

EmailBlacklist::exists('me@hivokas.com); // false

EmailBlacklist::count(); // 0

```

## Methods

#### all()

Returns all blacklisted emails.

#### count()

Returns amount of blacklisted emails.

#### exists(string $email)

Returns `true` if email is blacklisted and vice versa.

#### add(string $email)

Adds email to the blacklist.

#### remove(string $email)

Removes email from the blacklist.

#### validate(string $email)

Throws an `InvalidArgumentException` is email is invalid.

## Testing

You can run the tests with:

```bash
composer test
```
