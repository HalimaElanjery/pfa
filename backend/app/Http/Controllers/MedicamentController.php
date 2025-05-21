<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{

    public function index()
    {
        $medicaments = Medicament::all();
        return response()->json($medicaments);
    }

    
    public function ajouterMedicament(Request $request)
    {
        // Valider les données reçues du formulaire
        $validatedData = $request->validate([
            'NomMedica' => 'required|string',
            'DescriptionMedic' => 'required|string',
            'FormMedic' => 'required|string',
            'EffetSecondaire' => 'nullable|string',
        ]);
    
        // Créer un nouveau médicament avec les données validées
        $medicament = Medicament::create($validatedData);
    
        // Retourner une réponse JSON avec un message de succès et les données du médicament créé
        return response()->json(['message' => 'Médicament ajouté avec succès', 'medicament' => $medicament], 201);
    }
    
    public function modifierMedicament(Request $request, $id)
    {
        // Valider les données reçues du formulaire
        $validatedData = $request->validate([
            'NomMedica' => 'required|string',
            'DescriptionMedic' => 'required|string',
            'FormMedic' => 'required|string',
            'EffetSecondaire' => 'nullable|string',
        ]);
    
        // Récupérer le médicament à mettre à jour
        $medicament = Medicament::findOrFail($id);
    
        // Mettre à jour les attributs du médicament avec les données validées
        $medicament->update($validatedData);
    
        // Retourner une réponse JSON avec un message de succès et les données du médicament mis à jour
        return response()->json(['message' => 'Médicament modifié avec succès', 'medicament' => $medicament]);
    }
    
    public function supprimerMedicament($id)
    {
        // Trouver le médicament à supprimer
        $medicament = Medicament::findOrFail($id);
    
        // Supprimer le médicament
        $medicament->delete();
    
        // Retourner une réponse JSON avec un message de succès
        return response()->json(['message' => 'Médicament supprimé avec succès']);
    }
}
