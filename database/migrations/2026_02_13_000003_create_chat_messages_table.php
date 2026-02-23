<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('chat_messages')) {
            Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->string('chatDokterId');
            $table->string('customerId')->nullable();
            $table->string('dokterId')->nullable();
            $table->longText('message');
            $table->enum('sender_type', ['customer', 'dokter']); // siapa yang mengirim
            $table->timestamp('created_at')->useCurrent();
            
            // Foreign key
            $table->foreign('chatDokterId')->references('chatDokterId')->on('chat_dokter')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
};
