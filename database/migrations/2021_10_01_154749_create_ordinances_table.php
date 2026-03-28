<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordinances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 250);
            $table->longText('description');
            $table->string('file');
            $table->string('created_by', 250)->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('views')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordinances');
    }
}
