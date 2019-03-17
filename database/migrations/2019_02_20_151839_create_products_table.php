<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
            $table->string('img5')->nullable();
            $table->integer('createdBy')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('virtualProduct')->nullable();
            $table->float('price')->default(0.00);
            $table->float('salePrice')->nullable();
            $table->float('regularPrice')->nullable();
            $table->text('description')->nullable();
            $table->text('purchaseNote')->nullable();
            $table->mediumText('excerpt')->nullable();
            $table->integer('supermarket_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('rating')->nullable();
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
        Schema::dropIfExists('products');
    }
}
