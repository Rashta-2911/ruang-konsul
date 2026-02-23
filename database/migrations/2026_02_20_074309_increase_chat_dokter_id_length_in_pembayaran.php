<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('pemesananId', 20)->change();
            $table->string('customerId', 20)->change();
        });

        Schema::table('pembayaran', function (Blueprint $table) {
            $table->string('pembayaranId', 20)->change();
            $table->string('customerId', 20)->change();
            $table->string('pemesananId', 20)->change();
            $table->string('chatDokterId', 20)->change();
        });

        Schema::table('detailPemesanan', function (Blueprint $table) {
            $table->string('detailPemesananId', 20)->change();
            $table->string('pemesananId', 20)->change();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('pemesananId', 5)->change();
            $table->string('customerId', 5)->change();
        });

        Schema::table('pembayaran', function (Blueprint $table) {
            $table->string('pembayaranId', 5)->change();
            $table->string('customerId', 5)->change();
            $table->string('pemesananId', 5)->change();
            $table->string('chatDokterId', 5)->change();
        });

        Schema::table('detailPemesanan', function (Blueprint $table) {
            $table->string('detailPemesananId', 5)->change();
            $table->string('pemesananId', 5)->change();
        });

        Schema::enableForeignKeyConstraints();
    }
};
