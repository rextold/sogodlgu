<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missionvisions', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('vision');
            $table->longText('mission');
            $table->string('image')->nullable();
            $table->integer('added_by')->nullable();
            $table->timestamps();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missionvisions');
    }
}
