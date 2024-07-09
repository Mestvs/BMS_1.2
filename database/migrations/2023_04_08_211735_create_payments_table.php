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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->integer('request_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->integer('amount');
            $table->string('payment_mode',55);
            $table->string('reference_no',30);
            $table->string('paid_to',33);
            $table ->date('paid_date',33);
            $table->integer('debit');
            $table->integer('credit');
            $table->integer('posted');
            $table->string('status',30);
            $table->foreign('request_id')->references('request_id')->on('payment_requests')->onDelete('cascade');
           $table->foreign('account_id')->references('account_id')->on('account_categories')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
