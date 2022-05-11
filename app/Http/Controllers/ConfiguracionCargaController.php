<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionCarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfiguracionCargaController extends Controller
{
    public function registrarCarga(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'anio' => 'required|unique:tblconfiguracioncarga',
            'proporcion' => 'required',
        ], [
            'anio.required' => 'El año es requerido',
            'anio.unique' => 'El año ya existe',
            'proporcion.required' => 'La proporción es requerida',
        ]);
        if($validator->fails()){
            return response()->json(['estado' => false, 'detalle' => $validator->errors()]);
        }
            else{
        $configuracionCarga = new ConfiguracionCarga();
        $configuracionCarga->proporcion=$request->proporcion;
        $configuracionCarga->diferencia=$request->diferencia;
        $configuracionCarga->anio=$request->anio;
        $configuracionCarga->activo=1;
        $configuracionCarga->save();
        return response()->json(['estado' => true, 'detalle' => $configuracionCarga]);
    }}
    public function listarCarga(Request $request)
    {
        $configuracionCarga = ConfiguracionCarga::where('activo', 1)->get();
        return response()->json(['estado' => true, 'detalle' => $configuracionCarga]);
    }
    public function actualizarCarga(Request $request)
    {
        $configuracionCarga = ConfiguracionCarga::find($request->id);
        $configuracionCarga->proporcion=$request->proporcion;
        $configuracionCarga->diferencia=$request->diferencia;
        $configuracionCarga->anio=$request->anio;
        $configuracionCarga->activo=$request->activo;
        $configuracionCarga->save();
        return response()->json(['estado' => true, 'detalle' => $configuracionCarga]);
    }
    public function eliminarCarga(Request $request)
    {
        $configuracionCarga = ConfiguracionCarga::find($request->id);
        $configuracionCarga->activo=0;
        $configuracionCarga->save();
        return response()->json(['estado' => true, 'detalle' => $configuracionCarga]);
    }
}
