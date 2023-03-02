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
        Schema::create('landing_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
             $table->tinyInteger('show_countdown')->default(0)->index();
             $table->tinyInteger('show_sponsor')->default(0)->index();
             $table->mediumText('sponsor_detail')->nullable(true);
             $table->longText('event_detail')->nullable(true);
             $table->tinyInteger('show_rewards')->default(0)->index();
              $table->longText('Short_faq')->nullable(true);
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
        Schema::dropIfExists('landing_page');
    }
};
