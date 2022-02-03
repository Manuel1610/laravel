<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Cuaderno;
Use Log;
use App\Http\Middleware\auth;

class CuadernoController extends Controller
{
    public function getAll(){
    $data = Cuaderno::get();
    return response()->json($data, 200);
    }

    public function create(Request $request){

    $data['fecha']        = $request['fecha'];
    $data['phone']        = $request['phone'];
    $data['area']         = $request['area'];
    $data['problema']     = $request['problema'];
    $data['responsablearea']      = $request['responsablearea'];
    $data['responsablesoporte']   = $request['responsablesoporte'];
    $data['codigopatrimonial']    = $request['codigopatrimonial'];
    $data['fechaentrega']         = $request['fechaentrega'];
    $data['salida']               = $request['salida'];

    Cuaderno::create($data);
    return response()->json([
        'message' => "Successfully created",
        'success' => true
        ], 200);
    }

    public function delete($id){
    $res = Cuaderno::find($id)->delete();
    return response()->json([
        'message' => "Successfully deleted",
        'success' => true
    ], 200);
    }

    public function get($id){
    $data = Cuaderno::find($id);
    return response()->json($data, 200);
    }

    public function update(Request $request,$id){

        Cuaderno::findOrFail($id)->update($request->all());
        return response()->json(['success' => true]);
    }
}
