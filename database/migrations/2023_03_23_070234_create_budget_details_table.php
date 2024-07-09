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
        Schema::create('budget_details', function (Blueprint $table) {
            $table->increments('budget_detail_id');
            $table->Integer('budget_id')->unsigned();
            $table->Integer('account_id')->unsigned();
            $table->Integer('amount');
            $table->string('status', 30);
        $table->foreign('budget_id')->references('budget_id')->on('budgets')->onDelete('cascade');
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
        Schema::dropIfExists('budget_details');
    }
};
