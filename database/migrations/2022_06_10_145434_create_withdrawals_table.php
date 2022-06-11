<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->default('0');
            $table->integer('fund')->default('0')->nullable();
            $table->string('paymenttype');
            $table->string('paymentnumber');
            $table->string('status')->default('0')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('withdrawals');
    }
}
