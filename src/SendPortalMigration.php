<?php

namespace Sendportal\Base;

use Illuminate\Database\Migrations\Migration;

class SendPortalMigration extends Migration
{
    public function getConnection()
    {
        return config('sendportal.database.connection');
    }
}
