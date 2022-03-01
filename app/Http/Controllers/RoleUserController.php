<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\roleuser;
Use Log;
use App\Http\Middleware\auth;

class RoleUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth.role:1');
    }

    public function getAll(){
        $data = roleuser::get();
        return response()->json($data, 200);
        }

    public function delete($id){
    $res = roleuser::find($id)->delete();
    return response()->json([
        'message' => "Successfully deleted",
        'success' => true
    ], 200);
    }

    public function get($id){
        $data = roleuser::find($id);
        return response()->json($data, 200);
        }
}
