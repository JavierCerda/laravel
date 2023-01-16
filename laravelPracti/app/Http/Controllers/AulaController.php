<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AulaController extends Controller
{
    public function getAll(){
        $aulas = DB::table('aula')->get();
        $response = [
            'success' => true,
            'message' => 'Estas son las aulas',
            'data' => $aulas,
        ];
        return response()->json($response);
    }

    public function getId(Request $request) {
        $aula = DB::table('aula')->where('id', $request->id)->get();
        $response = [
            'success' => true,
            'message' => 'Esta es la aula',
            'data' => $aula,
        ];
        return response()->json($response);
    }

    public function create(Request $request) {
        $datos = $request->validate([
            'aula' => 'required|string|max:32',
            'user_id' => '',
        ]);
        DB::table('aula')->insert($datos);
        $response = [
            'success' => true,
            'message' => 'aula creada',
            'data' => $datos,
        ];
        return response()->json($response, 201);
    }


    public function delete(Request $request) {
        $aula = DB::table('aula')->where('id', $request->id)->get();
        DB::table('aula')->where('id', $request->id)->delete();
        $response = [
            'success' => true,
            'message' => 'aula eliminada',
            'data' => $aula,
        ];
        return response()->json($response);
    }

    public function update(Request $request) {
        $datos = $request->validate([
            'aula' => 'string|max:32',            
        ]);

        DB::table('aula')->where('id', $request->id)->update($datos);
    }

    public function alumno(Request $request) {
        $aula = Aula::find($request->id)->alumnos;

        $response = [
            'success' => true,
            'message' => 'Estos son los alumnos de la aula',
            'data' => $aula,
        ];
        return response()->json($response);
    }

}
