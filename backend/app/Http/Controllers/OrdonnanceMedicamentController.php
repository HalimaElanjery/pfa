<?php

namespace App\Http\Controllers;

use App\Models\Ordonance;
use App\Models\Medicament;
use Illuminate\Http\Request;
use App\Models\OrdonnanceMedicament;
use Illuminate\Support\Facades\Log;

class OrdonnanceMedicamentController extends Controller
{




    public function index()
    {
        $ordonnancesmedicaments = OrdonnanceMedicament::all();
        return response()->json($ordonnancesmedicaments);
    }



public function show($ordonnance_id)
{
    // Recherche de l'ordonnance correspondant
    $ordonnance = Ordonance::findOrFail($ordonnance_id);

    // Récupération de tous les médicaments liés à cette ordonnance
    $medicaments = $ordonnance->medicaments;

    // Retourner les médicaments
    return response()->json($medicaments);
}

    



    // créer un nouveau OrdonnanceMedicament
    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicament_id' => 'required|exists:medicaments,id',
            'ordonnance_id' => 'required|exists:ordonnances,id'
        ]);


        $ordonnancesmedicaments = OrdonnanceMedicament::create($validated);

        return response()->json([
            'message' => 'Ordonnance créée avec succès',
            'ordonnance' =>  $ordonnancesmedicaments
        ], 201);
     
        Log::info('Validation Data:', $validated);

    }
    
}
