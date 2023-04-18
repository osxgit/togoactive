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
        Schema::create('challenge_team_leaderboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('team_type',50)->nullable();
            $table->string('team_name',255)->nullable();
            $table->unsignedBigInteger('region_id')->index();
            $table->unsignedBigInteger('rank')->index();
            $table->unsignedBigInteger('overall_rank')->index();
            $table->integer('fam_cycling_rank')->default(0);
            $table->integer('fri_cycling_rank')->default(0);
            $table->integer('col_cycling_rank')->default(0);
            $table->integer('walking_rank')->default(0)->index();
            $table->integer('running_rank')->default(0)->index();
            $table->integer('cycling_rank')->default(0)->index();
            $table->integer('swimming_rank')->default(0);
            $table->integer('total_users')->default(0)->index();
            $table->double('total_distance', 15, 8)->index();
            $table->double('average_distance', 15, 8)->index();
            $table->double('total_walking_distance', 15, 8)->index();
            $table->double('average_walking_distance', 15, 8)->index();
            $table->double('total_running_distance', 15, 8)->index();
            $table->double('average_running_distance', 15, 8)->index();
            $table->double('total_cycling_distance', 15, 8)->index();
            $table->double('manual_cycling_distance', 15, 8);
            $table->double('average_cycling_distance', 15, 8)->index();
            $table->double('total_elevation', 15, 8)->index();
            $table->double('total_cycling_elevation', 15, 8)->index();
            $table->double('total_walking_elevation', 15, 8)->index();
            $table->double('total_running_elevation', 15, 8)->index();
            $table->double('average_elevation', 15, 8)->index();
            $table->double('average_cycling_elevation', 15, 8)->index();
            $table->double('average_walking_elevation', 15, 8)->index();
            $table->double('average_running_elevation', 15, 8)->index();
            $table->double('total_swimming_distance', 15, 8);
            $table->double('average_swimming_distance', 15, 8);
            $table->integer('rides')->default(0)->index();
            $table->integer('walking_activities')->default(0)->index();
            $table->integer('running_activities')->default(0)->index();
            $table->integer('cycling_activities')->default(0)->index();
            $table->integer('swimming_activities')->default(0)->index();
            $table->double('last_activity_distance', 15, 8);
            $table->timestamp('last_activity_date');
            $table->string('last_activity_type',100)->nullable();
            $table->integer('last_activity_by')->default(0);
            $table->float('max_speed', 10, 2);
            $table->integer('achievements_unlocked')->default(0);
            $table->integer('unique_achievements_unlocked')->default(0);
            $table->text('preview_userids')->nullable();
            $table->text('preview_imgs')->nullable();
            $table->string('owner_username',255)->nullable();
            $table->integer('owner_userid')->nullable();
            $table->float('total_calories', 10, 2)->default(0);
            $table->float('total_cycling_calories', 10, 2)->default(0);
            $table->float('total_walking_calories', 10, 2)->default(0);
            $table->float('total_running_calories', 10, 2)->default(0);
            $table->float('total_swimming_calories', 10, 2)->default(0);
            $table->float('target_distance', 10, 2)->default(0);
            $table->float('target_fund', 10, 2)->default(0);
            $table->float('raised_fund', 10, 2)->default(0);
            $table->integer('donors')->default(0);
            $table->tinyInteger('qualified')->default(0);
            $table->string('team_profile_pic',255)->nullable();

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
        Schema::dropIfExists('challenge_team_leaderboards');
    }
};
