<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;

    protected $table = "libro";

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
    public static function search($query){
        if(!$query){
            return self::all();
        }
        return self::where('fecha', 'like', "%$query%")
        ->orWhere('phone','like', "%$query%")
        ->orWhere('area','like', "%$query%")
        ->orWhere('problema','like', "%$query%")
        ->orWhere('responsablearea','like', "%$query%")
        ->orWhere('responsablesoporte','like', "%$query%")
        ->orWhere('codigopatrimonial','like', "%$query%")
        ->orWhere('fechaentrega','like', "%$query%")
        ->orWhere('salida','like', "%$query%")
        ->get();
    }
}
