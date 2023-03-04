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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('tgp_userid')->default(0);
            $table->string('fb_id',100)->default(0);
            $table->string('google_id',100)->default(0);
            $table->string('apple_id',100)->default(0);
            $table->string('fullname')->default('');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dob')->nullable()->index();
            $table->enum('gender',['male','female'])->default('male')->index();
            $table->integer('profile_image_id')->default(0);
            $table->integer('cover_image_id')->default(0);

            $table->integer('strava_id')->default(0)->index();
            $table->tinyInteger('strava_error')->default(0)->index();

            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('email_verified')->default(0)->index();
            $table->string('ip',100)->nullable();

            $table->timestamp('desktop_last_login_time')->nullable();
            $table->timestamp('app_last_login_time')->nullable();
            $table->string('utoken',100)->nullable();
            $table->string('__login_token',100)->nullable();
            $table->integer('unread_counter')->default(0)->index();

            $table->tinyInteger('imported')->default(0)->index();
            $table->tinyInteger('banned')->default(0)->index();
            $table->tinyInteger('restricted')->default(0)->index();

            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_logged_in')->nullable()->index();
        });

        DB::statement('ALTER TABLE `users` ADD FULLTEXT INDEX fullname (fullname)');
        DB::statement('ALTER TABLE `users` ADD FULLTEXT INDEX username (username)');
        DB::statement('ALTER TABLE `users` ADD FULLTEXT INDEX email (email)');
        DB::statement('ALTER TABLE `users` ADD FULLTEXT INDEX user_token (utoken)');
        DB::statement('ALTER TABLE `users` ADD FULLTEXT INDEX login_token (__login_token)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropIndex('fullname');
            $table->dropIndex('username');
            $table->dropIndex('email');
            $table->dropIndex('user_token');
            $table->dropIndex('login_token');
        });
        Schema::dropIfExists('users');
    }
};
