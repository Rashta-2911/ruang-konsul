<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Make chatDokterId nullable using raw SQL to avoid requiring doctrine/dbal
        // This assumes the column is VARCHAR(255) as created in the original migration.
        DB::statement("ALTER TABLE `chat_messages` MODIFY `chatDokterId` VARCHAR(255) NULL");

        // Add chat_type column if it doesn't exist, defaulting to 'doctor'
        if (! Schema::hasColumn('chat_messages', 'chat_type')) {
            Schema::table('chat_messages', function (Blueprint $table) {
                $table->string('chat_type')->default('doctor')->after('sender_type');
            });
        }
    }

    public function down()
    {
        // Revert chat_type addition
        if (Schema::hasColumn('chat_messages', 'chat_type')) {
            Schema::table('chat_messages', function (Blueprint $table) {
                $table->dropColumn('chat_type');
            });
        }

        // Set NULL chatDokterId to empty string to allow converting back to NOT NULL
        DB::statement("UPDATE `chat_messages` SET `chatDokterId` = '' WHERE `chatDokterId` IS NULL");
        DB::statement("ALTER TABLE `chat_messages` MODIFY `chatDokterId` VARCHAR(255) NOT NULL");
    }
};
