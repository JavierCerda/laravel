<?php

namespace App\Http\Controllers;

use App\Models\Becas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BecaController extends Controller
{
    public function getAll(){
        $becas = DB::table('becas')->get();
        $response = [
            'success' => true,
            'message' => 'Estas son las becas',
            'data' => $becas,
        ];
        return response()->json($response);
    }

    public function getId(Request $request) {
        $becas = DB::table('becas')->where('id', $request->id)->get();
        $response = [
            'success' => true,
            'message' => 'Esta es la beca',
            'data' => $becas,
        ];
        return response()->json($response);
    }


    public function create(Request $request) {
        $datos = $request->validate([
            'tipo' => 'required|string|max:32',
            'cantidad' => 'required|string|max:32',
            'user_id' => '',
        ]);
        DB::table('becas')->insert($datos);
        $response = [
            'success' => true,
            'message' => 'Beca creada',
            'data' => $datos,
        ];
        return response()->json($response, 201);
    }

    public function delete(Request $request) {
        $beca = DB::table('becas')->where('id', $request->id)->get();
        DB::table('becas')->where('id', $request->id)->delete();
        $response = [
            'success' => true,
            'message' => 'Beca eliminada',
            'data' => $beca,
        ];
        return response()->json($response);
    }
    public function update(Request $request) {
        $datos = $request->validate([
            'tipo' => 'string|max:32',
            'cantidad' => 'string|max:32',
            
        ]);

        DB::table('becas')->where('id', $request->id)->update($datos);
    }


    public function alumno(Request $request) {
        $alumno = Becas::find($request->id)->alumno;

        $response = [
            'success' => true,
            'message' => 'Este es el alumno de la beca',
            'data' => $alumno,
        ];
        return response()->json($response);
    }
}
