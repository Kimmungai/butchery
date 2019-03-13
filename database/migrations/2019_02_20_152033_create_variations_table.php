<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('units_of_measure')->default(1);
            $table->tinyInteger('measurement_system')->default(1);
            $table->double('height')->nullable();
            $table->double('width')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->double('weight')->nullable();
            $table->integer('product_id')->unsigned();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('variations');
    }
}
