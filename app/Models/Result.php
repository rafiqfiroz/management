<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    
    public function Student(){

        return $this->belongsTo(Student::class,'student_id');
    }
}
