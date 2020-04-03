<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemTypeModel extends Model
{
    protected $table="ProblemType";
    protected $fillable = [
        'ProblemName',
    ];
}
