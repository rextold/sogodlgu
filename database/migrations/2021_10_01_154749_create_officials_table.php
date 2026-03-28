<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('descriptions')->nullable();
            $table->integer('department')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('image')->default('users/default.png');
            $table->integer('position_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('officials');
    }
}
