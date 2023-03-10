<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlumnoController extends Controller
{
    public function getAll()
     {
        $alumnos = DB::table('alumnos')->get();
        $response = [
            'success' => true,
            'message' => 'Estos son los alumnos',
            'data' => $alumnos,
        ];
        return response()->json($response);
    }
    public function getId(Request $request) {
        $alumnos = DB::table('alumnos')->where('id', $request->id)->get();
        $response = [
            'success' => true,
            'message' => 'Este es el alumno',
            'data' => $alumnos,
        ];
        return response()->json($response);
    }

    public function create(Request $request) {
        $datos = $request->validate([
            'nombre' => 'required|string|max:32',
            'telf' => 'nullable|string|max:16',
            'edad' => 'nullable|integer',
            'contrasena' => 'required|string|max:64',
            'correo' => 'email:rfc|max:64',
            'sexo' => 'nullable|string|max:16',
        ]);

        DB::table('alumnos')->insert($datos);
        $response = [
            'success' => true,
            'message' => 'Alumno creado',
            'data' => $datos,
        ];
        return response()->json($response, 201);
    }
    public function delete(Request $request) {
        $alumnos = DB::table('alumnos')->where('id', $request->id)->get();
        DB::table('alumnos')->where('id', $request->id)->delete();
        $response = [
            'success' => true,
            'message' => 'Alumno eliminado',
            'data' => $alumnos,
        ];
        return response()->json($response);
    }

    public function update(Request $request) {
        $datos = $request->validate([
            'nombre' => 'string|max:32',
            'telf' => 'string|max:16',
            'edad' => 'integer',
            'contrasena' => 'string|max:64',
            'correo' => 'email:rfc|max:64',
            'sexo' => 'string|max:16',
        ]);

        DB::table('alumnos')->where('id', $request->id)->update($datos);
    }

    public function beca(Request $request) {
        $alumno = Alumnos::find($request->id)->beca;

        $response = [
            'success' => true,
            'message' => 'Esta es la beca del alumno',
            'data' => $alumno,
        ];
        return response()->json($response);
    }
    public function aula(Request $request) {
        $aula = Alumnos::find($request->id)->aula;

        $response = [
            'success' => true,
            'message' => 'Esta es la aula del alumno',
            'data' => $aula,
        ];
        return response()->json($response);
    }
    
}
