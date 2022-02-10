<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroGat extends Model
{
    use HasFactory;
    protected $table = "librogat";

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
