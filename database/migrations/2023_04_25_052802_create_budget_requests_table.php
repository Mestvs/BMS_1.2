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
        Schema::create('budget_requests', function (Blueprint $table) {
            $table->increments('b_request_id');
            $table->integer('category_id')->unsigned();
            $table->string('b_request_title',30);
            $table ->date('b_request_date');
            $table->integer('b_request_amount');
            $table->string('description');
            $table->string('zerfe_name',33);
            $table->string('status',30);
            $table->Date('updated_at');
            $table->foreign('category_id')->references('category_id')->on('budget_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_requests');
    }
};
