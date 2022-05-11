<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitcoraController extends Controller
{
    public function registrarBitcora(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required',
        ], [
            'descripcion.required' => 'La descripción es requerida',
        ]);
        if($validator->fails()){
            return response()->json(['estado' => false, 'detalle' => $validator->errors()]);
        }
        else{
            $bitacora= new Bitacora();
            $bitacora->descripcion=$request->descripcion;
            $bitacora->save();
            return response()->json(['estado' => true, 'detalle' => $bitacora]);
        }
    }
}
