<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Practicantes;
Use Log;

class PracticantesController extends Controller
{
    public function getAll(){
        $data = Practicantes::get();
        return response()->json($data, 200);
    }

    public function create(Request $request){

        $data['Nombres']        = $request['Nombres'];
        $data['Apellidos']      = $request['Apellidos'];
        $data['DNI']            = $request['DNI'];
        $data['Turno']          = $request['Turno'];
        $data['Inicio']         = $request['Inicio'];
        $data['Fin']            = $request['Fin'];

        Practicantes::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
    }
    public function delete($id){
        $res = Practicantes::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
      }
      public function get($id){
        $data = Practicantes::find($id);
        return response()->json($data, 200);
      }
      public function update(Request $request,$id){

        Practicantes::findOrFail($id)->update($request->all());
              return response()->json(['success' => true]);
      }
}
