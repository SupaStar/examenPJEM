<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Carbon\Carbon;
use App\Models\ConfiguracionCarga;
use App\Models\ControlCarga;
use Illuminate\Support\Facades\Validator;

class SolicitudController extends Controller
{

    public function registrarSolicitud(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_solicitante' => 'required',
            'paterno_solicitante' => 'required',
            'materno_solicitante' => 'required',
            'fecha_solicitud' => 'required',], [
            'nombre_solicitante.required' => 'El nombre es requerido',
            'paterno_solicitante.required' => 'El apellido paterno es requerido',
            'materno_solicitante.required' => 'El apellido materno es requerido',
            'fecha_solicitud.required' => 'La fecha de solicitud es requerida',
        ]);
        if($validator->fails()){
            return response()->json(['estado' => false, 'detalle' => $validator->errors()]);
        }
        else{
        $solicitud=new Solicitud();
        $solicitud->nombre_solicitante=$request->nombre_solicitante;
        $solicitud->paterno_solicitante=$request->paterno_solicitante;
        $solicitud->materno_solicitante=$request->materno_solicitante;
        $solicitud->fecha_solicitud=$request->fecha_solicitud;
        $anioSolicitud=Carbon::parse($solicitud->fecha_solicitud)->format('Y');
        $controlCargas =ControlCarga::where('anio',$anioSolicitud)->first();
        $configCarga = ConfiguracionCarga::where('activo', 1)->where('anio',$anioSolicitud)->first();
        if($controlCargas && $configCarga){
        if(($controlCargas->total)>($configCarga->proporcion)){
            return response()->json(['estado' => false, 'detalle' => 'No hay suficientes cargas disponibles']);
        }
        else{
        $controlCargas->total=$controlCargas->total+1;
        $controlCargas->save();
        $solicitud->id_usuario=$controlCargas->id_usuario;
        $solicitud->activo=1;
        $solicitud->save();
        return response()->json(['estado' => true, 'detalle' => $solicitud]);
}}
else{
    return response()->json(['estado' => false, 'detalle' => 'No hay cargas registradas en ese anio']);
}}}
    public function listarSolicitud(Request $request)
    {
        $solicitud = Solicitud::where('activo', 1)->get();
        foreach ($solicitud as $soli) {
            $soli->usuario;
        }
        return response()->json(['estado' => true, 'detalle' => $solicitud]);
}
public function actualizarSolicitud(Request $request)
{
    $solicitud = Solicitud::find($request->id);
    $solicitud->id_usuario=$request->id_usuario;
    $solicitud->nombre_solicitante=$request->nombre_solicitante;
    $solicitud->paterno_solicitante=$request->paterno_solicitante;
    $solicitud->materno_solicitante=$request->materno_solicitante;
    $solicitud->fecha=$request->fecha;
    $solicitud->save();
    return response()->json(['estado' => true, 'detalle' => $solicitud]);
}
public function eliminarSolicitud($id)
{
    $solicitud = Solicitud::find($id);
    $anioSolicitud=Carbon::parse($solicitud->fecha_solicitud)->format('Y');
    $controlCargas =ControlCarga::where('anio',$anioSolicitud)->first();
    $controlCargas->total=$controlCargas->total-1;
    $controlCargas->save();
    $solicitud->delete();
    return response()->json(['estado' => true, 'detalle' => $solicitud]);
}
public function listarSolicitudUsuario(Request $request)
{
    $solicitud = Solicitud::where('id_usuario', $request->id_usuario)->get();
    return response()->json(['estado' => true, 'detalle' => $solicitud]);}
    public function cancelarSolicitud($id)
    {
        $solicitud = Solicitud::find($id);
    $anioSolicitud=Carbon::parse($solicitud->fecha_solicitud)->format('Y');
    $controlCargas =ControlCarga::where('anio',$anioSolicitud)->first();
    $controlCargas->total=$controlCargas->total-1;
    $solicitud->activo=0;
        $controlCargas->save();
        $solicitud->save();
        return response()->json(['estado' => true, 'detalle' => $solicitud]);
    }
}
