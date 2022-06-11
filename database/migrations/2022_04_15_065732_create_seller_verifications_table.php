<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
class CreateSellerVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('identitynumber')->default('0')->nullable();
            $table->string('address')->default('0')->nullable();
            $table->string('identitypath')->default('0')->nullable();
            $table->string('identitytype')->default('0')->nullable();
            $table->string('paymenttype')->default('0')->nullable();
            $table->string('paymentnumber')->default('0')->nullable();
            $table->integer('totalfund')->default('0')->nullable();
            $table->string('fundstatus')->default('0')->nullable();

            $table->string('deleted')->default('0');
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
        Schema::dropIfExists('seller_verifications');
    }
}
