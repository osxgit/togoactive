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
        Schema::create('user_media', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('module',50)->default('');
            $table->string('image_type',50)->default('');
            $table->string('dimensions',50)->default('original');
            $table->string('path');
            $table->tinyinteger('removed')->default(0);
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
        Schema::dropIfExists('user_media');
    }
};
