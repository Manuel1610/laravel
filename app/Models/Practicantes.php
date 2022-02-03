<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practicantes extends Model
{
    use HasFactory;

    protected $table = "Practicantes";

    protected $fillable = [
      'Nombres',
      'Apellidos',
      'FechaNacimiento',
      'DNI',
      'Celular',
      'Turno',
      'Inicio',
      'Fin'
    ];
}
