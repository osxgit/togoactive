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
        Schema::create('strava_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid')->index();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->integer('strava_id')->default(0)->index();
            $table->string('strava_access_token')->default('');
            $table->string('strava_refresh_token')->default('');
            $table->string('strava_token_expiry')->default('');
            $table->tinyInteger('strava_error')->default(0)->index();
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
        Schema::dropIfExists('strava_accounts');
    }
};
