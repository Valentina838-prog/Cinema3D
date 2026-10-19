<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //
    public $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'ninos',
        'madre_cabeza',
        'estudio',
        'generos'
    ];
}
