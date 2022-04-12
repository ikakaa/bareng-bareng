<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('comment');
            $table->string('commentname');
            $table->foreignId('comment_by_id');
            $table->foreignId('product_id');
            $table->string('deleted')->default('0');

            $table->foreign('product_id')->references('id')->on('product_details');
            $table->foreign('comment_by_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_comments');
    }
}
