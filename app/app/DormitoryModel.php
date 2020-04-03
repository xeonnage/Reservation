<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DormitoryModel extends Model
{
    protected $table="Dormitory";
    protected $fillable = [
        'Name_English',
        'Name_Thai',
        'Description',

    ];
}
