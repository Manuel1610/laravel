<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuaderno extends Model
{
    use HasFactory;

    protected $table = "cuaderno";

    protected $fillable = [
        'fecha',
        'phone',
        'area',
        'problema',
        'responsablearea',
        'responsablesoporte',
        'codigopatrimonial',
        'fechaentrega',
        'salida'
    ];
}
