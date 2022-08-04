<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{

    protected $fillable = ['studentCode', 'numberGraduate', 'name', 'description', 'photo', 'type_photo', 'stauts'];

}
