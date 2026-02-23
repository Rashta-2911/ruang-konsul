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
        Schema::table('formAppointment', function (Blueprint $table) {
            // Drop foreign keys by name if they exist
            // We use direct SQL if needed because dropForeign might fail if names don't match Laravel pattern
            try {
                $table->dropForeign('formappointment_ibfk_1');
            } catch (\Exception $e) {}
            
            try {
                $table->dropForeign('formappointment_ibfk_2');
            } catch (\Exception $e) {}
        });

        Schema::table('formAppointment', function (Blueprint $table) {
            // Change column types to match parent tables (varchar 50, utf8mb4_unicode_ci)
            $table->string('customerId', 50)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable()->change();
            $table->string('dokterId', 50)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable()->change();
        });

        Schema::table('formAppointment', function (Blueprint $table) {
            // Re-add foreign keys with proper names (Laravel default names oribkf ones)
            $table->foreign('customerId', 'formappointment_ibfk_1')
                  ->references('customerId')
                  ->on('customer')
                  ->onDelete('cascade');
                  
            $table->foreign('dokterId', 'formappointment_ibfk_2')
                  ->references('dokterId')
                  ->on('dokter')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formAppointment', function (Blueprint $table) {
            $table->dropForeign('formappointment_ibfk_1');
            $table->dropForeign('formappointment_ibfk_2');
        });

        Schema::table('formAppointment', function (Blueprint $table) {
            $table->string('customerId', 5)->nullable()->change();
            $table->string('dokterId', 5)->nullable()->change();
        });

        Schema::table('formAppointment', function (Blueprint $table) {
            $table->foreign('customerId', 'formappointment_ibfk_1')
                  ->references('customerId')
                  ->on('customer');
                  
            $table->foreign('dokterId', 'formappointment_ibfk_2')
                  ->references('dokterId')
                  ->on('dokter');
        });
    }
};
