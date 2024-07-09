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
        Schema::create('plan_approval_details', function (Blueprint $table) {
            $table->increments('plan_approved_id');
            $table->integer('zerfe_sent_id')->unsigned();
            $table->string('approver_name',50);
            $table->string('signature',30);
            $table->date('approved_date')->nullable();
         $table->foreign('zerfe_sent_id')->references('zerfe_sent_id')->on('zerfe_plan_sents')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_approval_details');
    }
};
