<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('UserDetails_ID');
            $table->string('RoomCode_ID');
            $table->string('term');
            $table->dateTime('BookingDate');//วันที่จอง
            $table->dateTime('DueDate'); //วันที่กำหนด(ครบสัญญา)
            $table->string('Status');
            $table->string('Detail');
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
        Schema::dropIfExists('Reservations');
    }
}
