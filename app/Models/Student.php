<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    public function Department(){

        return $this->belongsTo(Department::class,'department_id');
    }
}
