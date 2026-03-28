<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangay_officials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('captain');
            $table->integer('barangay_id');
            $table->integer('position_id');
            $table->string('contactnumber')->nullable();
            $table->integer('author_id');
            $table->timestamps();
            $table->integer('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangay_officials');
    }
}
