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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->string('pembayaranId', 5)->primary();
            $table->string('customerId', 5);
            $table->string('pemesananId', 5);
            $table->string('chatDokterId', 5)->nullable();
            $table->integer('amount')->nullable();
            $table->char('metodePembayaran', 100)->nullable();
            $table->date('date');
            $table->char('status', 50)->nullable();

            $table->foreign('customerId')
                  ->references('customerId')
                  ->on('customer')
                  ->onDelete('cascade');

            $table->foreign('pemesananId')
                  ->references('pemesananId')
                  ->on('pemesanan')
                  ->onDelete('cascade');

            $table->foreign('chatDokterId')
                  ->references('chatDokterId')
                  ->on('chatDokter')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
