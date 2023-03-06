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
        Schema::create('events_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamp('registration_start_date')->index()->nullable();
            $table->timestamp('registration_end_date')->index()->nullable();
            $table->timestamp('free_registration_end_date')->index()->nullable();
            $table->timestamp('update_info_end_date')->index()->nullable();
            $table->timestamp('upgrade_start_date')->index()->nullable();
            $table->timestamp('upgrade_end_date')->index()->nullable();
            $table->timestamp('leaderboard_start_date')->index()->nullable();
            $table->timestamp('leaderboard_end_date')->index()->nullable();
            $table->timestamp('results_date')->index()->nullable();
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
        Schema::table('events_dates', function($table) {
            $table->dropIndex('registration_start_date');
            $table->dropIndex('registration_end_date');
            $table->dropIndex('free_registration_end_date');
            $table->dropIndex('update_info_end_date');
            $table->dropIndex('upgrade_start_date');
            $table->dropIndex('upgrade_end_date');
            $table->dropIndex('leaderboard_start_date');
            $table->dropIndex('leaderboard_end_date');
            $table->dropIndex('results_date');
        });
        Schema::dropIfExists('events_dates');
    }
};
