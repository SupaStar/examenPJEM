<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function registrarUsuario(Request $request)
    {

       $validator =Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:tblusuarios',
            'password' => 'required|string|min:6',
        ], [
            'nombre.required' => 'El nombre es requerido',
             'paterno.required' => 'El apellido paterno es requerido',
             'materno.required' => 'El apellido materno es requerido',
             'login.required' => 'El login es requerido',
             'password.required' => 'El password es requerido',
             'login.unique' => 'El Correo ya existe registrado',
             'password.min' => 'El password debe tener al menos 6 caracteres',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            else{
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->paterno = $request->paterno;
        $usuario->materno = $request->materno;
        $usuario->login = $request->login;
        $usuario->password = Hash::make($request->password);
        $usuario->activo = 1;
        $usuario->save();
        return response()->json(['estado' => true, 'detalle' => $usuario]);
        }
    }
    public function loginUsuario(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ], [
            'login.required' => 'El login es requerido',
            'password.required' => 'El password es requerido',
            'password.min' => 'El password debe tener al menos 6 caracteres',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            else{
        $usuario = Usuario::where('login', $request->login)->first();
        if ($usuario) {
            if($usuario->activo!=1){

                return response()->json(['estado' => false, 'detalle' => 'Usuario inactivo']);
            } else{
            if (Hash::check($request->password, $usuario->password)) {
                $idU=Auth::user()->id;
                return response()->json(['estado' => true, 'detalle' => 'Usuario autenticado correctamente'+$idU]);
            }

            else {
                return response()->json(['estado' => false, 'detalle' => 'Contrase�a incorrecta']);
            }}
        } else {
            return response()->json(['estado' => false, 'detalle' => 'Usuario no existe']);
        }
    }
}
}
