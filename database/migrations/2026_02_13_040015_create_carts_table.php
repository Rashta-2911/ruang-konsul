<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (! Schema::hasTable('carts')) {
        Schema::create('carts', function (Blueprint $table) {
        $table->id();
        $table->string('customerId');
        $table->string('produkId');
        $table->integer('qty')->default(1);
        $table->timestamps();

        $table->foreign('customerId')
              ->references('customerId')
              ->on('customers')
              ->onDelete('cascade');

        $table->foreign('produkId')
              ->references('produkId')
              ->on('produks')
              ->onDelete('cascade');
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
