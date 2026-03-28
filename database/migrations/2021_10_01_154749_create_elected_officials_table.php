<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectedOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elected_officials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('officials_id');
            $table->integer('positions_id');
            $table->integer('order')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->integer('added_by')->nullable();
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
        Schema::dropIfExists('elected_officials');
    }
}
