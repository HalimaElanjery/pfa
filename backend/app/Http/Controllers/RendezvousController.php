<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RendezvousController extends Controller
{
    
     // Récupérer la liste des Rendezvous 
     public function index()
     {
         $rendezvous = Rendezvous::with('patient')->get();
         return response()->json($rendezvous);
     }


     // Récupérer la liste des Rendezvous confirme
     public function listerendezvous()
     {
        $rendezvous = Rendezvous::where('confirme', true)->with('patient')->get();

         return response()->json($rendezvous);
     }



     // Récupérer les rendez-vous pour une date spécifique
     public function getByDate($date)
     {
         $rendezvous = Rendezvous::with('patient') // Assuming you want to include patient data
                              ->whereDate('dateRendezvs', $date)
                              ->get();
         return response()->json($rendezvous);
     }
 
     

    public function planifier(Request $request)
    {
        // Valider les données reçues du formulaire
        $validatedData = $request->validate([
            'patientId' => 'required|exists:patients,id',
            'dateRendezVous' => 'required|date',
        ]);

        // Créer un nouveau rendez-vous avec les données validées
        $rendezvous = Rendezvous::create([
            'patient_id' => $validatedData['patientId'],
            'dateRendezvs' => $validatedData['dateRendezVous'],
        ]);

        // Retourner une réponse JSON avec un message de succès et les données du rendez-vous créé
        return response()->json(['message' => 'Rendez-vous créé avec succès', 'rendezvous' => $rendezvous], 201);
    }


    public function confirmer(Rendezvous $rendezvous)
    {
        $rendezvous->update(['confirme' => true]);
        return response()->json(['message' => 'Rendez-vous confirmé avec succès', 'rendezvous' => $rendezvous]);
    }
    
    public function annuler(Rendezvous $rendezvous)
    {
        $rendezvous->update(['confirme' => false]);
        return response()->json(['message' => 'Rendez-vous annulé avec succès', 'rendezvous' => $rendezvous]);
    }
    
}
