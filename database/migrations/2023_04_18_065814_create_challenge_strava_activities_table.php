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
        Schema::create('challenge_strava_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achievement_id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('achievement_id')->references('id')->on('achievements');
            $table->integer('activity_id')->default(0);
            $table->unsignedBigInteger('strava_id')->nullable();
            $table->foreign('strava_id')->references('id')->on('strava_accounts');
            $table->string('name',255)->nullable();
            $table->float('distance',10,2)->comment('meter');
            $table->integer('moving_time')->default(0);
            $table->integer('elapsed_time')->default(0);
            $table->float('total_elevation_gain',10,2);
            $table->string('type',50)->nullable();
            $table->string('actual_type',100)->nullable();
            $table->string('external_id',255)->nullable();
            $table->timestamp('start_date')->index()->nullable();
            $table->timestamp('start_date_local')->index()->nullable();
            $table->timestamp('end_date_local')->index()->nullable();
            $table->float('start_latitude',10,2);
            $table->float('start_longitude',10,2);
            $table->float('end_latitude',10,2);
            $table->float('end_longitude',10,2);
            $table->string('location_city',100);
            $table->string('location_state',100);
            $table->string('location_country',100);
            $table->integer('achievement_count')->default(0);
            $table->string('map_id',50);
            $table->float('average_speed',10,2);
            $table->float('max_speed',10,2);
            $table->float('elev_high',10,2);
            $table->float('elev_low',10,2);
            $table->tinyInteger('flagged');
            $table->tinyInteger('exclude');
            $table->tinyInteger('suspicious');
            $table->string('sus_params',100);
            $table->integer('sus_params_count')->default(0);
            $table->tinyInteger('duplicate');
            $table->tinyInteger('page_found');
            $table->timestamp('page_found_date');
            $table->string('start_country',255);  
            $table->integer('photos_count')->default(0);
            $table->tinyInteger('photoUpdated');
            $table->text('photos');
            $table->text('user_photos');
            $table->string('dof',255);
            $table->timestamp('sync_timestamp');
            $table->tinyInteger('tagged');
            $table->tinyInteger('tagged_ride');
            $table->tinyInteger('manual_ride');
            $table->tinyInteger('manual_upload');
            $table->float('calories',10,2);
            $table->tinyInteger('calories_synced');
            $table->string('remarks',255);
            $table->tinyInteger('photoUploaded');

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
        Schema::dropIfExists('challenge_strava_activities');
    }
};
