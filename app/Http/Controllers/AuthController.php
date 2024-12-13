<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //* |-> Validamos los campos entrantes
        $validate_data = $request->validate(([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string',
            'password' => 'required|string'
        ]));

        $validate_data['password'] = bcrypt($validate_data['password']);

        //* |-> Instancia del modelo Users
        $user = User::create($validate_data);

        //* |-> Instanciamos el token de acceso
        $token = $user->createToken('Laravel Personal Access Client')->accessToken;

        //* |-> Respondemos al cliente un exito 200
        return response()->json([
            'success' => true,
            'message' => 'Registro exitoso!',
            'user_data' => $user,
            'token:' => $token
        ]);
    }

    public function login(Request $request)
    {
        if (
            Auth::attempt(['email' => $request->email, 'password' => $request->password])
        ) {
            $user = User::where('email', $request->email)->first();
            //* |-> Instanciamos el token de acceso
            $token = $user->createToken('Laravel Personal Access Client')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'Bienvenido '.$user->name,
                'token:' => $token,
            ]);
        }
    }
}
