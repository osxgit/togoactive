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
        Schema::create('event_success_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->longText('no_purchase_made')->nullable();
            $table->longText('partial_purchase_made')->nullable();
            $table->longText('all_purchase_made')->nullable();
            $table->tinyInteger('active_custom_message')->default(0);
            $table->longText('invite_friend')->nullable();
            $table->string('email_subject',255)->nullable();
            $table->longText('email_body')->nullable();
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
        Schema::table('event_success_page', function (Blueprint $table) {
            Schema::dropIfExists('event_success_page');
        });
    }
};
