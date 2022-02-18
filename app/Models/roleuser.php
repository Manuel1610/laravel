<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleuser extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "roleuser";

    protected $fillable = [
      'id_users',
      'id_role'
    ];

}
