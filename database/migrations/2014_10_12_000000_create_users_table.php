<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->mediumText('address')->nullable();
            $table->text('biography')->nullable();
            $table->string('avatar')->nullable();
            $table->string('idNo')->nullable();
            $table->string('idImage')->nullable();
            $table->string('passport')->nullable();
            $table->string('passportImage')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('DOB')->nullable();
            $table->integer('supermarket_id')->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
}
