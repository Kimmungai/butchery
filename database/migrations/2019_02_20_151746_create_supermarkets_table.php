<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupermarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supermarkets', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->mediumText('tagline')->nullable();
            $table->string('website')->nullable();
            $table->string('emailAddress')->unique()->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('branch')->nullable();
            $table->string('branchCode')->nullable();
            $table->text('description')->nullable();
            $table->text('shopNotice')->nullable();
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
        Schema::dropIfExists('supermarkets');
    }
}
