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
        Schema::create('zerfe_plans', function (Blueprint $table) {
            $table->increments('zerfe_plan_id');
            $table->integer('zerfe_id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->string('filename',50);
            $table->integer('size');
            $table->string('description')->nullable();
            $table->date('date')->nullable();
            $table->string('status',30)->default('Not Signed');
            $table->foreign('plan_id')->references('plan_id')->on('plans')->onDelete('cascade');
            $table->foreign('zerfe_id')->references('zerfe_id')->on('Zerfes')->onDelete('cascade');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zerfe_plans');
    }
};