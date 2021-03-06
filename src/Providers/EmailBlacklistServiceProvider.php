<?php

namespace Hivokas\EmailBlacklist\Providers;

use Hivokas\EmailBlacklist\Contracts\EmailBlacklist as EmailBlacklistContract;
use Hivokas\EmailBlacklist\EmailBlacklist;
use Illuminate\Support\ServiceProvider;

class EmailBlacklistServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/email_blacklist.php' => config_path('email_blacklist.php'),
        ], 'config');

        if (! class_exists('CreateBlacklistedEmailsTable')) {
            $this->publishes([
                __DIR__.'/../../database/migrations/create_blacklisted_emails_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_blacklisted_emails_table.php'),
            ], 'migrations');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmailBlacklistContract::class, EmailBlacklist::class);

        $this->app->singleton('email_blacklist', EmailBlacklistContract::class);

        $this->mergeConfigFrom(
            __DIR__.'/../../config/email_blacklist.php',
            'email_blacklist'
        );
    }
}
