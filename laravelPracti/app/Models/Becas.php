<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Becas extends Model
{
    use HasFactory;


    public function alumno(){
        return $this->belongsTo(Alumnos::class,'user_id');
    }
}
