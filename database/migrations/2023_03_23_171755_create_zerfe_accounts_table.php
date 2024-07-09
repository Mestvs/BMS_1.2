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
        Schema::create('zerfe_accounts', function (Blueprint $table) {
            $table->increments('zerfe_account_id');
            $table->Integer('zerfe_id')->unsigned();
            $table->Integer('account_id')->unsigned();
        $table->foreign('account_id')->references('account_id')->on('account_categories')->onUpdate('cascade');
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
        Schema::dropIfExists('zerfe_accounts');
    }
};
