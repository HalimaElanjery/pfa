<?php

namespace App\Http\Controllers;

use App\Models\Ordonance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdonanceController extends Controller
{

    public function index()
    {
        $ordonnance = Ordonance::all();
        return response()->json($ordonnance);
    }

    


    
    public function show($consultationId)
{
    // Recherche de l'ordonnance avec les médicaments associés et les informations du patient via la consultation
    $ordonnance = Ordonance::with(['medicaments', 'consultation.patient'])
        ->where('consultation_id', $consultationId)
        ->first();

    // Vérification si une ordonnance a été trouvée
    if (!$ordonnance) {
        return response()->json(['message' => 'Ordonnance non trouvée pour cette consultation'], 404);
    }

    // Retourner l'ordonnance trouvée avec les médicaments et les infos du patient
    return response()->json($ordonnance);
}

    

    


   // Créer une nouvelle ordonnance
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'dateOrdonance' => 'required|date',
            'NoteMedicale' => 'sometimes|string'
        ]);

        $ordonnance = Ordonance::create($validatedData);

        return response()->json([
            'message' => 'Ordonnance créée avec succès',
            'ordonnance' => $ordonnance
        ], 201);
    }


    public function update(Request $request, Ordonance $ordonance)
    {
        // Logique pour modifier une ordonnance
    }

    public function delete(Ordonance $ordonance)
    {
        // Logique pour supprimer une ordonnance
    }
}
