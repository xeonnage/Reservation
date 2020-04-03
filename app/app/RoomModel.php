<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table="Rooms";
    protected $fillable = [
        'RoomCode_ID',
        'Floor',
        'AtNumberPreple',
        'StatusRoom',
        'Roomtype_ID'
    ];
}
