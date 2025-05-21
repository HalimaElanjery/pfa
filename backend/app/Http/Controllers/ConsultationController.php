<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ConsultationController extends Controller
{
    // Afficher toutes les consultations
    public function index()
    {
        $consultations = Consultation::all();
        return response()->json($consultations);
    }

      // Afficher les consultations pour un patient spécifique
      public function ConsultationParPatient($patientId)
      {
          try {
              // Récupérer les consultations du patient avec l'ID spécifié
              $consultations = Consultation::where('patient_id', $patientId)->get();
  
              // Vérifier si des consultations ont été trouvées
              if ($consultations->isEmpty()) {
                  return response()->json(['message' => 'Aucune consultation trouvée pour ce patient'], 404);
              }
  
              return response()->json($consultations);
          } catch (\Exception $e) {
              return response()->json(['message' => 'Erreur lors de la récupération des consultations', 'error' => $e->getMessage()], 500);
          }
      }

    // Créer une nouvelle consultation
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'rendezvous_id' => 'required|exists:rendezvous,id',
            'Datecons' => 'required|date',
            'poid' => 'required|string',
            'taille' => 'required|string',
            'prix' => 'required|numeric',
            'EtatPatient' => 'required|string',
            'HTA' => 'required|string',
            'maladie' => 'required|string',
            'TraitementRecommande' => 'required|string',
        ]);

        $consultation = Consultation::create($validatedData);
        return response()->json(['message' => 'Consultation créée avec succès', 'consultation' => $consultation], 201);
    }

    // Mettre à jour une consultation existante
    public function update(Request $request, Consultation $consultation)
    {
        $validatedData = $request->validate([
            'patient_id' => 'exists:patients,id',
            'rendezvous_id' => 'exists:rendezvous,id',
            'Datecons' => 'date',
            'poid' => 'string',
            'taille' => 'string',
            'prix' => 'numeric',
            'EtatPatient' => 'string',
            'HTA' => 'string',
            'maladie' => 'string',
            'TraitementRecommande' => 'string',
        ]);

        $consultation->update($validatedData);
        return response()->json(['message' => 'Consultation mise à jour avec succès', 'consultation' => $consultation]);
    }

    // Supprimer une consultation
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return response()->json(['message' => 'Consultation supprimée avec succès']);
    }


}
