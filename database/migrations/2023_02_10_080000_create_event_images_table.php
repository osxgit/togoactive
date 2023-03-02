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
        Schema::create('event_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('cover')->nullable();
            $table->string('icon')->nullable();
            $table->string('notification')->nullable();
            $table->string('rewards')->nullable();
            $table->string('event_name')->nullable();
            $table->string('slider_background')->nullable();
            $table->string('slider_foreground')->nullable();
            $table->string('profile_icon')->nullable();
            $table->string('ebib')->nullable();
            $table->string('certificate')->nullable();
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
        Schema::dropIfExists('event_images');
    }
};
