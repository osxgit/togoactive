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
        Schema::create('challenge_leaderboards', function (Blueprint $table) {
            $table->id();
            $table->string('user_type',50)->nullable();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_user_id')->references('id')->on('event_users');
            $table->foreign('event_id')->references('id')->on('events');
            $table->unsignedBigInteger('strava_id')->nullable();
            $table->foreign('strava_id')->references('id')->on('strava_accounts');
            $table->integer('rank');
            $table->integer('rank_cycle');
            $table->integer('rank_run');
            $table->integer('rank_swim');
            $table->integer('rank_walk');
            $table->integer('rank_indoor');
            $table->integer('rank_outdoor');
            $table->integer('rank_all');
            $table->integer('highest_rank');
            $table->double('total_distance', 15, 8);
            $table->double('manual_total_distance', 15, 8);
            $table->double('total_cycling_distance', 15, 8);
            $table->double('manual_cycling_distance', 15, 8);
            $table->double('total_walking_distance', 15, 8);
            $table->double('total_running_distance', 15, 8);
            $table->double('total_swimming_distance', 15, 8);
            $table->double('total_elevation_gain', 15, 8);
            $table->float('last_activity_distance', 10, 2);
            $table->timestamp('last_activity_date');
            $table->string('last_activity_type')->nullable();
            $table->integer('rides');
            $table->integer('manual_rides');
            $table->integer('running_activities');
            $table->integer('cycling_activities');
            $table->integer('walking_activities');
            $table->integer('swimming_activities');
            $table->float('cycled_today', 10, 2);
            $table->float('average_speed', 10, 2);
            $table->float('total_calories', 10, 2)->default(0);
            $table->float('total_cycling_calories', 10, 2)->default(0);
            $table->float('total_running_calories', 10, 2)->default(0);
            $table->float('total_walking_calories', 10, 2)->default(0);
            $table->float('total_swimming_calories', 10, 2)->default(0);
            $table->float('max_speed', 10, 2);
            $table->integer('riding_time');
            $table->timestamp('date_finished');
            $table->timestamp('elite_date_finished')->default('0000-00-00 00:00:00');
            $table->float('target_distance', 10, 2)->default(0);
            $table->float('raised_fund', 10, 2)->default(0);
            $table->float('target_fund', 10, 2)->default(0);
            $table->integer('donors')->default(0);
            $table->tinyInteger('finished')->default(0);
            $table->tinyInteger('qualified')->default(0);
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
        
        Schema::table('challenge_leaderboards', function (Blueprint $table) {
            Schema::dropIfExists('challenge_leaderboards');
        });
    }
};
