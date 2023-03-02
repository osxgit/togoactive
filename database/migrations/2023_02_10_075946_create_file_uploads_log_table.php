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
        Schema::create('file_upload_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('eventid')->nullable();
            $table->string('file_type')->default('');
            $table->string('image_type')->default('');
            $table->string('module')->default('');
            $table->string('path')->default('');
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('file_upload_logs');
    }
};
