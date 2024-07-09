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
        Schema::create('payment_authorize_details', function (Blueprint $table) {
            $table->increments('p_authorize_id');
            $table->integer('request_id')->unsigned();
            $table->string('authorizer_name',30);
            $table->string('signature',33);
            $table ->date('authorized_date');
            $table->foreign('request_id')->references('request_id')->on('payment_requests')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_authorize_details');
    }
};
