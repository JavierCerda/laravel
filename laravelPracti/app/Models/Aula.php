<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    //Uno a muchos 
    public function alumnos(){
        return $this->hasMany(Alumnos::class,'aula_id');
    }
}
