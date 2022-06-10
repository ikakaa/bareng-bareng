<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('product_id');
            $table->foreignId('order_id');
            $table->foreignId('seller_id')->default('0');
            $table->integer('qty');
            $table->integer('totalPrice');
            $table->string('variant');
            $table->integer('fund');
            $table->string('fundstatus')->default('0')->nullable();

            $table->string('itemsentbyseller')->default('0')->nullable();
            $table->string('shipmentnumber')->default('0')->nullable();
            $table->string('itemreceived')->default('0')->nullable();
            $table->string('deleted')->default('0')->nullable();
            $table->string('cancelrequest')->default('0')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product_details');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('seller_id')->references('user_id')->on('product_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
