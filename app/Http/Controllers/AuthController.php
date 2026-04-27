<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'dni' => 'required|string|unique:personas,dni',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'rol' => 'required|in:rescatista,adoptante',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
        ]);

        $persona = Persona::create([
            'nombre_completo' => $request->nombre_completo,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo' => $request->rol,
        ]);

        $user = User::create([
            'name' => $request->nombre_completo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'persona_id' => $persona->id,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'rol' => $user->rol,
            'persona_id' => $persona->id,
            'nombre' => $persona->nombre_completo,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'rol' => $user->rol,
            'persona_id' => $user->persona_id,
            'nombre' => $user->name,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['mensaje' => 'Sesion cerrada correctamente']);
    }
}