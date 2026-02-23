<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Fix chat_type column size - change from CHAR to VARCHAR(50) or larger
        DB::statement("ALTER TABLE `chat_messages` MODIFY `chat_type` VARCHAR(50) DEFAULT 'doctor'");
    }

    public function down()
    {
        // Revert to original if needed
        DB::statement("ALTER TABLE `chat_messages` MODIFY `chat_type` VARCHAR(50)");
    }
};
