<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('RoomCode_ID');
            $table->string('Floor');
            $table->integer('AtNumberPreple');
            $table->string('StatusRoom');
            $table->integer('Roomtype_ID');
            $table->integer('Dormitory_ID');
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
        Schema::dropIfExists('Rooms');
    }
}
