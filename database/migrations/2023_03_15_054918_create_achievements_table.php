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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('title', 255);
            $table->text('description');
            $table->string('icon', 255);
            $table->set('type', ['Individual', 'Team', 'Indoor', 'Outdoor']);
            $table->enum('level', ['Easy', 'Intermediate', 'Difficult', 'Insane']);
            $table->tinyInteger('is_more_info_enabled', false, true)->default(0);

            /**
             * more_info_image and more_info_description fields are nullable
             * but during validation required if is_more_info_enabled equal to 1
             */
            $table->string('more_info_image', 255)->nullable();
            $table->text('more_info_description')->nullable();

            $table->string('email_subject', 255);
            $table->text('email_text');
            $table->string('notification_title', 255);
            $table->text('notification_description');
            $table->enum('notfication_type', ['Type A', 'Type B']);

            // Below field is nullable but during validation need to check if type A then required
            $table->string('notification_destination_url', 255)->nullable();

            // Below field is nullable but during validation need to ccheck if type A then required
            $table->string('notification_hero_image', 255)->nullable();

            $table->tinyInteger('is_primary_cta_enabled', false, true)->default(0);

            /**
             * primary_cta_button_text and primary_cta_link fields are nullable
             * but during validation required if is_primary_cta_enabled equal to 1
             */
            $table->string('primary_cta_button_text', 100)->nullable();
            $table->string('primary_cta_link', 255)->nullable();

            $table->tinyInteger('is_secondary_cta_enabled', false, true)->default(0);

            /**
             * secondary_cta_button_text and secondary_cta_link fields are nullable
             * but during validation required if is_secondary_cta_enabled equal to 1
             */
            $table->string('secondary_cta_button_text', 100)->nullable();
            $table->string('secondary_cta_link', 255)->nullable();

            $table->tinyInteger('is_share_option_enabled', false, true)->default(0);

            /**
            * Below field is nullable but during validation need to check
            * if is_share_option_enabled equal to 1 then required
            */
            $table->string('enable_share_option_link', 255)->nullable();

            $table->tinyInteger('is_sponsor_content_enabled', false, true)->default(0);

            /**
            * sponsor_content_image and sponsor_content_text fields are nullable but during validation need to check
            * if is_sponser_content_enabled equal to 1 then required
            */
            $table->string('sponsor_content_image', 255)->nullable();
            $table->text('sponsor_content_text')->nullable();

            $table->unsignedInteger('list_order');

            $table->index('list_order', 'achievements_list_order_idx');

            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
};
