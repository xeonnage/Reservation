<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTypeModel extends Model
{
    protected $table="TypeRoom";
    protected $fillable = [
        'Type',
        'NumberPeople',
        'Dormitory_ID',

    ];
}
