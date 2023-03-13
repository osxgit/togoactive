<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('payment_type')->fulltext();
            $table->string('payment_method')->fulltext();
            $table->float('total_amount', 10, 2);
            $table->float('discount', 10, 2);
            $table->float('total_paid', 10, 2);
            $table->string('currency')->fulltext();
            $table->string('coupon_code')->fulltext();
            $table->string('status')->fulltext();
            $table->longText('full_response')->nullable(true);
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
};
