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
        Schema::table('events_faqs', function (Blueprint $table) {
            $table->longText('event_tnc')->nullable()->after('event_faq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events_faqs', function (Blueprint $table) {
            $table->dropColumn('event_tnc');
        });
    }
};
