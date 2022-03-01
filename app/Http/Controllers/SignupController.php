<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Log;
use App\Http\Middleware\auth;

class SignupController extends Controller
{
    //
    public function create(Request $data)
    {
            $usuario = new User();
            $usuario->name=$data->name;
            $usuario->email=$data->email;
            $usuario->password=$data->password;
            $usuario->save();
    }
}
