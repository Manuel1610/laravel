<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $data)
    {
        $usuario = new User();
        $usuario->nombre=$data->name;
        $usuario->email=$data->email;
        $usuario->password=$data->password;
        $usuario->save();
    }

}
