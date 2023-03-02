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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->fulltext();
            $table->string('hashtag',100)->fulltext();
            $table->integer('domain')->index();
            $table->string('slug',100)->unique()->fulltext();
            $table->text('description')->fulltext();
            $table->string('timezone',50)->default('+8');
            $table->string('email',100)->default('');
            $table->tinyInteger('email_active')->default(0)->index();
            $table->enum('accessibility',['public','private'])->default('public')->index();
            $table->tinyInteger('visibility')->index();
            //$table->tinyInteger('upgrade_enabled')->default(1)->index();
            $table->float('finisher_distance')->default(0.0);
            $table->float('elite_finisher_distance')->default(0.0);
            $table->tinyInteger('event_status')->default(0)->index();
            $table->timestamp('created_at')->index()->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('updated_at')->index()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function($table) {
            $table->dropIndex('name');
            $table->dropIndex('hashtag');
            $table->dropIndex('domain');
            $table->dropIndex('slug');
            $table->dropIndex('description');
            $table->dropIndex('email_active');
            $table->dropIndex('accessibility');
            $table->dropIndex('visibility');
            $table->dropIndex('upgrade_enabled');
            $table->dropIndex('event_status');
            $table->dropIndex('created_at');
            $table->dropIndex('updated_at');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('events');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
