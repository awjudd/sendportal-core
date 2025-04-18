<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Sendportal\Base\Models\EmailServiceType;

class AddSmtpEmailServiceType extends \Sendportal\Base\SendPortalMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('sendportal_email_service_types')
            ->insert(
                [
                    'id' => EmailServiceType::SMTP,
                    'name' => 'SMTP',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
    }
}
