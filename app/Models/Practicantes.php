<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practicantes extends Model
{
    use HasFactory;

    protected $table = "practicantes";

    protected $fillable = [
      'Nombres',
      'Apellidos',
      'DNI',
      'Turno',
      'Inicio',
      'Fin'
    ];
}
