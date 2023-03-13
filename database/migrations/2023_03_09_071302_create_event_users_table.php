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
        Schema::create('event_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('strava_account_id')->nullable();
            $table->foreign('strava_account_id')->references('id')->on('strava_accounts');
            $table->string('gender')->index();
            $table->date('dob')->index();
            $table->string('referral_code')->nullable()->index();
            $table->integer('address_id')->index();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('subdistrict')->nullable();
            $table->text('postal_code')->nullable();
            $table->string('country')->index();
            $table->text('bib')->index();
            $table->text('token')->index();
            $table->text('remarks')->nullable();
            $table->tinyInteger('is_paid_user')->default(0)->index();
            $table->tinyInteger('has_upgraded')->default(0)->index();
            $table->tinyInteger('is_finisher')->default(0)->index();
            $table->tinyInteger('is_elite_finisher')->default(0)->index();
            $table->tinyInteger('is_autoPorted')->default(0)->index();
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
        Schema::dropIfExists('event_users');
    }
};
