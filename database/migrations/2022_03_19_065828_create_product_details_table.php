<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_name');
            $table->string('folderpath');
            $table->string('owner');
            $table->string('shortdesc');
            $table->string('product_type');
            $table->integer('moq');
            $table->integer('productstock');
            $table->integer('productprice');
            $table->string('startdate');
            $table->string('enddate');
            $table->string('endtime');
            $table->string('shippingdate');
            $table->string('discordlink');
            $table->integer('deleted')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
