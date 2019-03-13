<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->float('amountDue')->nullable();
            $table->float('amountReceived')->nullable();
            $table->integer('discountPercentage')->nullable();
            $table->integer('discountAmount')->nullable();
            $table->float('amountPayable')->nullable();
            $table->string('method')->nullable();
            $table->text('methodCheckoutId')->nullable();
            $table->text('requestId')->nullable();
            $table->string('receiptNo')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('payments');
    }
}
