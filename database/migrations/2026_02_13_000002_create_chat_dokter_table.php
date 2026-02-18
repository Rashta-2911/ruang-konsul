<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_dokter', function (Blueprint $table) {
            $table->string('chatDokterId')->primary();
            $table->string('customerId');
            $table->string('dokterId');
            $table->integer('price')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('status')->nullable();
            $table->string('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_dokter');
    }
};
