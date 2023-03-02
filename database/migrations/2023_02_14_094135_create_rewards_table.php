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
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->string('name')->index();
            $table->string('sku')->index();
            $table->string('description')->default('');
            $table->integer('max_quantity');
            $table->string('size')->default('');
            $table->mediumText('sizing_images')->nullable(true);
            $table->mediumText('rewards_images')->nullable(true);
            $table->tinyInteger('restrict_to_country')->default(0)->index();
            $table->string('countries_allowed')->default('');
            $table->mediumText('price')->nullable(true);
            $table->tinyInteger('is_hidden')->default(0)->index();
            $table->tinyInteger('is_core_item')->default(1)->index();
            $table->tinyInteger('is_dependent_sku')->default(0)->index();
            $table->integer('dependent_sku')->nullable();
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
        Schema::dropIfExists('rewards');
    }
};
