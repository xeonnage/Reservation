<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    protected $table="Reservations";
    protected $fillable = [
        'User_ID',
        'RoomCode_ID',
        'term',
        'BookingDate',
        'DueDate',
        'Status',
        'Detail',
    ];
}
