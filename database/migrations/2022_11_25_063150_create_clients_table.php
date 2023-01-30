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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clientid')->default(0)->index();
            $table->string('client_name',100)->default('')->fullText();
            $table->string('client_url',100)->default('')->fullText();
            $table->string('client_type',50)->default('')->fullText();
            $table->string('secret_token',255)->default('');
            $table->text('refresh_token');
            $table->integer('role_id')->default(0);
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
        Schema::dropIfExists('clients');
    }
};
