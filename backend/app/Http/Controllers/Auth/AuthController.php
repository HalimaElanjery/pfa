<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Récupère l'utilisateur authentifié
            $token = $user->createToken('authToken')->plainTextToken;
            $role = $user->role; // Assurez-vous que l'utilisateur a un attribut 'role'
    
            // Incluez le rôle de l'utilisateur dans la réponse
            return response()->json(['token' => $token, 'role' => $role]);
        }
    
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // Supprime tous les tokens pour l'utilisateur
        return response()->json(['message' => 'Successfully logged out']);
    }
    
}
