<?php

namespace Hivokas\EmailBlacklist\Models;

use Illuminate\Database\Eloquent\Model;

class BlacklistedEmail extends Model
{
    protected $fillable = [
        'email',
    ];

    public function getTable()
    {
        return config('email_blacklist.table_name');
    }
}
