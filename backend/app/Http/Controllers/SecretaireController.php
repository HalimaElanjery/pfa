<?php

namespace App\Http\Controllers;

use App\Models\Patient;
//use App\Models\Secretaire;
use App\Models\User;

use Illuminate\Http\Request;

class SecretaireController extends Controller
{

        // Récupérer la liste des secrétaires
       public function afficherSecretaire()
    {
        // Filtrer les utilisateurs ayant le rôle de 'secretaire'
        $secretaires = User::where('role', 'secretaire')->get();
        return response()->json($secretaires);
    }


    public function createSecretaire(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'NumTele' => 'nullable|string',
            'Adress' => 'nullable|string',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = 'secretaire';

        $secretaire = User::create($validatedData);

        return response()->json(['message' => 'Secrétaire ajouté avec succès', 'secretaire' => $secretaire], 201);
    }

    

 
    // Mettre à jour un secrétaire existant
    public function updateSecretaire(Request $request, $id)
    {
        $secretaire = User::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|string',
            'NumTele' => 'nullable|string',
            'Adress' => 'nullable|string',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $secretaire->update($validatedData);

        return response()->json(['message' => 'Secrétaire mis à jour avec succès', 'secretaire' => $secretaire]);
    }


    // Supprimer un secrétaire
    public function destroy($id)
    {
        $secretaire = User::findOrFail($id);
        $secretaire->delete();

        return response()->json(['message' => 'Secrétaire supprimé avec succès']);
    }


    
}
