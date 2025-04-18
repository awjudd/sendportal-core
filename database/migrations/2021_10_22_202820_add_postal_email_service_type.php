<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Sendportal\Base\Models\EmailServiceType;

class AddPostalEmailServiceType extends \Sendportal\Base\SendPortalMigration
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
                    'id' => EmailServiceType::POSTAL,
                    'name' => 'Postal',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
    }
}
