<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSogodhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sogodhistories', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('body')->nullable();
            $table->text('map')->nullable();
            $table->timestamps();
            $table->integer('added_by')->nullable();
            $table->integer('status')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sogodhistories');
    }
}
