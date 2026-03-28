<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sb_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('officials_id');
            $table->integer('positions_id');
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->integer('status')->nullable()->default(0);
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
        Schema::dropIfExists('sb_members');
    }
}
