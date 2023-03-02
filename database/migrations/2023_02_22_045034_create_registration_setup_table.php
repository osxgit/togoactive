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
        Schema::create('registration_setup', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->text('intro_message')->nullable();
            $table->tinyInteger('enable_teams')->default(0)->index();
            $table->integer('min_members')->nullable();
            $table->integer('max_members')->nullable();
            $table->tinyInteger('enable_referral')->default(0)->index();
            $table->tinyInteger('enable_coupon')->default(0)->index();
            $table->tinyInteger('enable_delivery_address')->default(0)->index();
            $table->text('reason_for_collecting_address')->nullable();
            $table->tinyInteger('enable_grouping')->default(0)->index();
            $table->string('grouping_header',100)->default('')->fulltext();
            $table->text('field_value')->nullable();
            $table->tinyInteger('enable_random_allocation')->default(0)->index();
            $table->text('geo_json')->nullable();
            $table->tinyInteger('enable_map_view')->default(0)->index();
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
        Schema::dropIfExists('registration_setup');
    }
};
