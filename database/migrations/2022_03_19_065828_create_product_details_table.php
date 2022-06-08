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
            $table->foreignId('user_id');
            $table->string('product_name');
            $table->string('folderpath');
            $table->string('owner');
            $table->string('shortdesc');
            $table->string('product_type');
            $table->string('productlist');
            $table->integer('moq');
            $table->integer('productstock');
            $table->integer('productprice');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('endtime');
            $table->date('shippingdate');
            $table->string('discordlink');
            $table->integer('deleted')->default('0');
            $table->string('verified')->default('0');
            $table->string('rejectreason')->default('0');
            $table->string('interestdone')->default('0');
            $table->string('sellingdone')->default('0');
            $table->string('isfinish')->default('0');
            $table->string('icfail')->default('0');


            $table->foreign('user_id')->references('id')->on('users');
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
