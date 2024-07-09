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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zerfe_id')->unsigned()->default(1);
            $table->integer('directorate_id')->unsigned()->default(1);
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('role')->nullable();
            $table->string('signature')->nullable();
            $table->string('account_status')->default('Not Activated');
            $table ->string('profile_location',50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
           $table->foreign('zerfe_id')->references('zerfe_id')->on('Zerfes')->onUpdate('cascade');
           $table->foreign('directorate_id')->references('directorate_id')->on('directorates')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
