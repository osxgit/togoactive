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
        if (Schema::hasColumn('event_users', 'payment_intent'))
        {
            Schema::table('event_users', function (Blueprint $table) {
                $table->dropColumn('payment_intent');
            });

        }
        if (!Schema::hasColumn('event_users', 'group'))
        {
            Schema::table('event_users', function (Blueprint $table) {
                $table->string('group',100)->after('country');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_users', function (Blueprint $table) {
            $table->dropColumn('group');
        });
    }
};
