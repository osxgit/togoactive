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
        Schema::create('users_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid')->index();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->string('meta_key')->default('');
            $table->string('meta_value')->default('');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `users_meta` ADD FULLTEXT INDEX meta_key_index (meta_key)');
        DB::statement('ALTER TABLE `users_meta` ADD FULLTEXT INDEX meta_value_index (meta_value)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_meta', function($table) {
            $table->dropIndex('meta_key_index');
            $table->dropIndex('meta_value_index');
        });
        Schema::dropIfExists('users_meta',function(Blueprint $table){
            $table->dropForeign('user_id');
        });
    }
};
