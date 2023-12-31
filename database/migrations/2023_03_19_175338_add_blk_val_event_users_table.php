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
        if (!Schema::hasColumn('event_users', 'blk'))
        {
            Schema::table('event_users', function (Blueprint $table) {
                $table->text('blk',255)->after('state')->nullable();
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
        if (Schema::hasColumn('event_users', 'blk'))
        {
            Schema::table('event_users', function (Blueprint $table) {
                $table->dropColumn('blk');
            });
        }
    }
};
