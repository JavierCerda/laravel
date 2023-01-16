<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    public function beca(){
        return $this->hasOne(Becas::class, 'user_id');
    }

    public function aula(){
        return $this->belongsTo(Aula::class, 'aula_id');
    }
}
