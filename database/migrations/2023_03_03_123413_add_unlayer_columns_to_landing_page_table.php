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
        Schema::table('landing_page', function (Blueprint $table) {
            $table->longText('sponsor_detail')->after('event_detail')->nullable(true);
            $table->longText('event_detail_unlayer')->after('sponsor_detail')->nullable(true);
            $table->longText('sponsor_detail_unlayer')->after('event_detail_unlayer')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page', function (Blueprint $table) {
            //
        });
    }
};
