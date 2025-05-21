<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
      // Récupérer la liste des Patient
      public function afficherPatient()
      {
          $patients = Patient::all();
          return response()->json($patients);
      }

      public function getPatientById($id)
      {
          $patient = Patient::find($id);
          if (!$patient) {
              return response()->json(['error' => 'Patient not found'], 404);
          }
          return response()->json($patient);
      }


      public function ajouterPatient(Request $request)
      {
          // Valider les données reçues du formulaire
          $validatedData = $request->validate([
              'nomPatient' => 'required|string',
              'prenomPatient' => 'required|string',
              'sexe' => 'required|string',
              'adresse' => 'required|string',
              'DateNaissance' => 'required|date',
              'situationF' => 'required|string',
              'assurance' => 'required|string',
          ]);
      
          // Créer un nouveau patient avec les données validées
          $patient = Patient::create($validatedData);
      
          // Retourner une réponse JSON avec un message de succès et les données du patient créé
          return response()->json(['message' => 'Patient ajouté avec succès', 'patient' => $patient], 201);
      }
      
  public function modifierPatient(Request $request, $id)
  {
      // Valider les données reçues du formulaire
      $validatedData = $request->validate([
          'nomPatient' => 'required|string',
          'prenomPatient' => 'required|string',
          'sexe' => 'required|string',
          'adresse' => 'required|string',
          'DateNaissance' => 'required|date',
          'situationF' => 'required|string',
          'assurance' => 'required|string',
      ]);
  
      // Récupérer le patient à mettre à jour
      $patient = Patient::findOrFail($id);
  
      // Mettre à jour les attributs du patient avec les données validées
      $patient->update($validatedData);
  
      // Retourner une réponse JSON avec un message de succès et les données du patient mis à jour
      return response()->json(['message' => 'Patient modifié avec succès', 'patient' => $patient]);
  }
  
  
  
  public function supprimerPatient($id)
  {
      // Trouver le patient à supprimer
      $patient = Patient::findOrFail($id);
  
      // Supprimer le patient
      $patient->delete();
  
      // Retourner une réponse JSON avec un message de succès
      return response()->json(['message' => 'Patient supprimé avec succès']);
  }


    public function consulterMedecin(Patient $patient)
    {
        // Logique pour consulter les informations du médecin pour un patient
    }
}
