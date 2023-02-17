<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //este método recoge user y password y devuelve un token si no existe el usuario y un mensaje si ya existe
    public function login(Request $request)
    {
        if(Auth::guard('api')->check()){
            $response = [
                'success' => true,
                'message' => "Este usuario ya esta logeado",
                'data' => null
            ];
            return response($response, 200);
        } else {
           if($request->email){
            $data = $request->validate([
                'email' => 'required|email:rfc',
                'password' => 'required'
            ]);
           }else{
            $data = $request->validate([
                'name' => 'required|string',
                'password' =>'required'
            ]);
           }
            if (Auth::attempt($data)) {
                //si el login se completa el usuario se añade a la clase auth
                return Auth::user()->createToken('token');
            }else{
                $response = [
                    'success' => false,
                    'message' => "El usuario o la contraseña no son correctos",
                    'data' => null
                ];
                return response($response, 400);
            }
        }
    }
    public function register(Request $request)
    {
        $response = [
            'success' => false,
            'message' => "Este usuario ya esta logeado",
            'data' => null
        ];
        if(Auth::guard('api')->check()){
            return response($response, 200);
        } else {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email:rfc|unique:users,email',
                'password' => 'required'
            ]);
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);

            if (!empty( $user)) {
                //si el login se completa el usuario se añade a la clase auth
                $response = [
                    'success' => true,
                    'message' => "Usuario creado!!",
                    'data' => $user->createToken('token'),
                ];
                return response($response, 200);
            }else{
                $response = [
                    'success' => false,
                    'message' => "El usuario o la contraseña no son correctos",
                    'data' => null
                ];
                return response($response, 400);
            }
        }
    }
    //Solo puede entrar si esta logeado
    public function whoAmi(Request $request){
        $response = [
            'success' => true,
            'message' => "Usuario",
            'data' => Auth::guard('api')->user(),
        ];
        return response($response , 200);
    }
    public function logOut(Request $request){
        $response = [
            'success' => true,
            'message' => "Token eliminado",
            'data' => Auth::guard('api')->user(),
        ];
        Auth::guard('api')->user()->tokens()->delete();
        return response($response , 200);
    }
    public function home(Request $request){
        $response = [
            'success' => true,
            'message' => "Esto es HOME!!",
            'data' => null,
        ];
        return response($response , 200);
    }
}
