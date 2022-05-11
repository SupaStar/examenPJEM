<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlCarga;
use App\Models\ConfiguracionCarga;

class ControlCargaController extends Controller
{
    public function registrarCarga(Request $request)
    {
        $controlCarga=new ControlCarga();
        $controlCarga->id_usuario=$request->id_usuario;
        $controlCarga->anio=$request->anio;
        $controlCarga2=ControlCarga::where('id_usuario',$controlCarga->id_usuario)->where('anio',$controlCarga->anio)->first();
        if($controlCarga2){
            return response()->json(['estado' => false, 'detalle' => 'Ya hay una carga registrada para este usuario en este anio']);
    }
        else{
            $configCarga = ConfiguracionCarga::where('activo', 1)->where('anio',$controlCarga->anio)->first();
            $controlCarga->save();
            return response()->json(['estado' => true, 'detalle' => $controlCarga]);
        }
}}
