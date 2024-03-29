<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('productid');
            $table->string('filename');
            $table->string('filesize');
            $table->string('filepath');

            $table->string('deleted')->default('0');
            $table->timestamps();
            $table->foreign('productid')->references('id')->on('product_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details_files');
    }
}
