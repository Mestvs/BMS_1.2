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
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->increments('request_id');
            $table->integer('category_id')->unsigned();
            $table->integer('zerfe_id')->unsigned();
            $table->integer('directorate_id')->unsigned();
            $table->string('title',50);
            $table->string('amount',50);
            $table->string('description',55);
            $table->date('request_date',55);
            $table->string('requester_name',30);
            $table->string('signature',33);
            $table ->string('approval',33);
            $table->string('pay_status');
            $table->timestamps();
            $table->foreign('category_id')->references('category_id')->on('budget_categories')->onDelete('cascade');
           $table->foreign('zerfe_id')->references('zerfe_id')->on('Zerfes')->onUpdate('cascade');
           $table->foreign('directorate_id')->references('directorate_id')->on('directorates')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_requests');
    }
};
