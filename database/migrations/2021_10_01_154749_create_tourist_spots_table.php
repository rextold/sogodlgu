<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_spots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->longText('body')->nullable();
            $table->integer('status')->default(1);
            $table->text('contact')->nullable();
            $table->text('image')->nullable();
            $table->text('map')->nullable();
            $table->integer('tourism_category_id')->nullable();
            $table->timestamps();
            $table->integer('added_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourist_spots');
    }
}
