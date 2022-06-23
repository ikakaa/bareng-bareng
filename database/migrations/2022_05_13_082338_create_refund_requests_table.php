<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid');
            $table->foreignId('orderid');
            $table->string('title')->default('0')->nullable();
            $table->string('reason')->default('0')->nullable();
            $table->string('status')->default('0')->nullable();
            $table->string('paymentType')->default('0')->nullable();
            $table->string('paymentNumber')->default('0')->nullable();

            $table->string('rejectreason')->default('0')->nullable();
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('orderid')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refund_requests');
    }
}
