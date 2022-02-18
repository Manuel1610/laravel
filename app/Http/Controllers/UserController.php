<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Log;
use App\Http\Middleware\auth;


class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth.role:1');
    }

    public function getAll(){
        $data = User::get();
        return response()->json($data, 200);
        }

    public function create(Request $data)
    {
        $usuario = new User();
        $usuario->password=$data->password;
        $usuario->save();
    }

    public function delete($id){
        $res = User::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
    }

    public function get($id){
        $data = User::find($id);
        return response()->json($data, 200);
    }

    public function update($id, Request $request){
        error_log($id);
        $res = User::where('id', $id)->first();
        $res->name  =   $request->name;
        $res->email =   $request->email;
        $res->save();

        return response()->json(['success' => true]);
    }
}
