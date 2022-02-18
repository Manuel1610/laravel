<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\roleuser;
use Log;
use App\Http\Middleware\auth;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware('auth.role:1');
    }

    public function getAll(){
        $data = role::get();

        return response()->json($data, 200);
    }

    public function create(Request $request){

        $data['name']       = $request  ['name'];

        role::create($data);

        return response()->json([
        'message' => "Successfully created",
        'success' => true
            ], 200);
    }

    public function delete($id){
        $res = role::find($id)->delete();
        return response()->json([
        'message' => "Successfully deleted",
        'success' => true
        ], 200);
    }

    public function get($id){
    $data = role::find($id);
    return response()->json($data, 200);
    }

    public function update(Request $request,$id){

        role::findOrFail($id)->update($request->all());
        return response()->json(['success' => true]);
    }

    public function roluserId($id){
        $data = roleuser::join('role','role.id','roleuser.id_role')
        ->where('roleuser.id_users', $id)->select('roleuser.id','role.name')->get();

        return response()->json($data, 200);
    }

    public function roluser(Request $request){
        $data["id_users"]   = $request['id_users'];
        $data["id_role"]    = $request['id_role'];

        roleuser::create($data);

        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
    }
}
