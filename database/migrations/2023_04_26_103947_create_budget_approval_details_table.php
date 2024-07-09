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
        Schema::create('budget_approval_details', function (Blueprint $table) {
            $table->increments('approval_id');
            $table->integer('b_request_id')->unsigned();
            $table->string('approver_name',30);
            $table->string('signature',30);
            $table ->date('approved_date');
            $table->foreign('b_request_id')->references('b_request_id')->on('budget_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_approval_details');
    }
};
