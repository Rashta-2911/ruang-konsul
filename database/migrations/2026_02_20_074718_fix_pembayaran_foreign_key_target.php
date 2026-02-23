<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            // Drop the old incorrect foreign key
            // We use raw SQL because the name might be 'pembayaran_ibfk_3' or something else
            try {
                // Try to drop by the name we saw
                DB::statement('ALTER TABLE pembayaran DROP FOREIGN KEY pembayaran_ibfk_3');
            } catch (\Exception $e) {
                // If it fails, maybe it doesn't exist or has a different name
                // Laravel's dropForeign might try to guess but often fails with ibfk names
            }
            
            // Re-add the correct foreign key pointing to chat_dokter
            $table->foreign('chatDokterId')->references('chatDokterId')->on('chat_dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign(['chatDokterId']);
            // Re-adding the broken one would be silly, but for completeness:
            // $table->foreign('chatDokterId')->references('chatDokterId')->on('chatDokter');
        });
    }
};
