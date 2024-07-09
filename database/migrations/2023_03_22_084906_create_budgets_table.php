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
        Schema::create('budgets', function (Blueprint $table) {
            $table->increments('budget_id');
            $table->Integer('year');
            $table->Integer('category_id')->unsigned();
            $table->Integer('zerfe_id')->unsigned();
            $table->Integer('budget_amount');
            $table->Integer('remain_amount');
            $table->date('intial_date');
            $table->date('final_date');
            $table->string('budget_description');
            $table->string('status', 30);
        $table->foreign('category_id')->references('category_id')->on('budget_categories')->onUpdate('cascade');
        $table->foreign('zerfe_id')->references('zerfe_id')->on('Zerfes')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
};
