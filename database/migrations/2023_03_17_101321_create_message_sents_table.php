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
        Schema::create('message_sents', function (Blueprint $table) {
            $table->increments('message_sent_id');
            $table->integer('reciever_id')->unsigned();
            $table->string('content');
            $table->integer('sender_id')->unsigned();
            $table->string('reciever_name');
            $table->string('sender_name');
            $table->timestamp('date_sended')->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_sents');
    }
};
