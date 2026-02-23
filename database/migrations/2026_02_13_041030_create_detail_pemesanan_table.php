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
        if (! Schema::hasTable('detailPemesanan')) {
            Schema::create('detailPemesanan', function (Blueprint $table) {
            $table->string('detailPemesananId', 5)->primary();
            $table->string('pemesananId', 5);
            $table->string('produkId', 5)->nullable();
            $table->integer('hargaSatuan')->nullable();

            $table->foreign('pemesananId')
                  ->references('pemesananId')
                  ->on('pemesanan')
                  ->onDelete('cascade');

            $table->foreign('produkId')
                  ->references('produkId')
                  ->on('produkALKES')
                  ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailPemesanan');
    }
};
