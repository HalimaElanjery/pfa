<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{

     // Récupérer le medecin
     public function index()
     {
         $medecin = Medecin::all();
         return response()->json($medecin);
     }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'NomMedecin' => 'required|string',
            'PrenomMedecin' => 'required|string',
            'Specialite' => 'required|string',
            'NumTele' => 'required|string',
            'Adresse' => 'required|string',
        ]);

        $medecin = Medecin::create($validated);
        return response()->json(['message' => 'Médecin ajouté avec succès', 'medecin' => $medecin]);
    }

    public function update(Request $request, Medecin $medecin)
    {
        $validated = $request->validate([
            'NomMedecin' => 'required|string',
            'PrenomMedecin' => 'required|string',
            'Specialite' => 'required|string',
            'NumTele' => 'required|string',
            'Adresse' => 'required|string',
        ]);

        $medecin->update($validated);
        return response()->json(['message' => 'Médecin mis à jour avec succès', 'medecin' => $medecin]);
    }
}
