<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\OrdonanceController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\OrdonnanceMedicamentController;


Route::get('/secretaires', [SecretaireController::class, 'afficherSecretaire']);
Route::post('/secretaires', [SecretaireController::class, 'createSecretaire']);
Route::put('/secretaires/{id}', [SecretaireController::class, 'updateSecretaire']);
Route::delete('/secretaires/{id}', [SecretaireController::class, 'destroy']);



// Route pour afficher la liste des patients
Route::get('/secretaires/consulterPatient', [PatientController::class, 'afficherPatient']);

// Route pour ajouter un patient
Route::post('/secretaires/ajouterPatient', [PatientController::class, 'ajouterPatient']);

// Route pour modifier un patient
Route::put('/secretaires/modifierPatient/{id}', [PatientController::class, 'modifierPatient']);

// Route pour supprimer un patient
Route::delete('/secretaires/supprimerPatient/{id}', [PatientController::class, 'supprimerPatient']);



// Route pour afficher la liste des médicaments
Route::get('/medicaments', [MedicamentController::class, 'index']);

// Route pour ajouter un médicament
Route::post('/medicaments', [MedicamentController::class, 'ajouterMedicament']);

// Route pour modifier un médicament
Route::put('/medicaments/{id}', [MedicamentController::class, 'modifierMedicament']);

// Route pour supprimer un médicament
Route::delete('/medicaments/{id}', [MedicamentController::class, 'supprimerMedicament']);


// Route pour afficher la liste des rendez-vous confirmer avec patient pour la consultation
Route::get('/listerendezvous', [RendezvousController::class, 'listerendezvous']);




// Route pour afficher la liste des rendez-vous confirmer ajourd'hui avec patient pour la consultation
Route::get('/listerendezvousconfirmer', [StatistiqueController::class, 'listerendezvousconfirmer']);

// Route pour afficher la liste des rendez-vous non confirmer ajourd'hui avec patient pour la consultation
Route::get('/listerendezvousnonconfirmer', [StatistiqueController::class, 'listerendezvousnonconfirmer']);


// Route pour afficher la liste des rendez-vous confirmer demain avec patient pour la consultation
Route::get('/listerendezvousconfirmerdemain', [StatistiqueController::class, 'listerendezvousconfirmerdemain']);

// Route pour afficher la liste des rendez-vous non confirmer demain avec patient pour la consultation
Route::get('/listerendezvousnonconfirmerdemain', [StatistiqueController::class, 'listerendezvousnonconfirmerdemain']);



Route::get('/revenue/today', [StatistiqueController::class, 'revenuAujourdhui']);
Route::get('/revenue/yesterday', [StatistiqueController::class, 'revenuHier']);
Route::get('/revenue/thisweek', [StatistiqueController::class, 'revenuCetteSemaine']);
Route::get('/revenue/lastweek', [StatistiqueController::class, 'revenuSemaineDerniere']);
Route::get('/revenue/thismonth', [StatistiqueController::class, 'revenuCeMois']);
Route::get('/revenue/lastmonth', [StatistiqueController::class, 'revenuMoisDernier']);
Route::get('/revenue/thisyear', [StatistiqueController::class, 'revenuCetteAnnee']);
Route::get('/revenue/lastyear', [StatistiqueController::class, 'revenuAnneeDerniere']);


Route::get('/listerendezvousconsultationconfirme', [StatistiqueController::class, 'listerendezvousconsultationconfirme']);
Route::get('/listerendezvousnoninsereconsultationconfirme', [StatistiqueController::class, 'listerendezvousnoninsereconsultationconfirme']);




// Route pour afficher la liste des rendez-vous
Route::get('/rendezvous', [RendezvousController::class, 'index']);

// Route pour ajouter un rendez-vous
Route::post('/rendezvous', [RendezvousController::class, 'planifier']);


// Route pour récupérer les rendez-vous pour une date spécifique
Route::get('/rendezvous/date/{date}', [RendezvousController::class, 'getByDate']);

Route::patch('/rendezvous/{rendezvous}/confirmer', [RendezvousController::class, 'confirmer']);
Route::patch('/rendezvous/{rendezvous}/annuler', [RendezvousController::class, 'annuler']);



// Routes pour les consultations
Route::get('/consultations', [ConsultationController::class, 'index']);
Route::get('/consultations/{consultation}', [ConsultationController::class, 'ConsultationParPatient']);
Route::get('/patients/{id}', [PatientController::class, 'getPatientById']);
Route::post('/consultations', [ConsultationController::class, 'store']);
Route::put('/consultations/{consultation}', [ConsultationController::class, 'update']);
Route::delete('/consultations/{consultation}', [ConsultationController::class, 'destroy']);



// Route pour afficher une ordonnance spécifique
Route::get('/ordonnances', [OrdonanceController::class, 'index']);

// Route pour afficher une ordonnance spécifique
Route::get('/ordonnances/{consultationId}', [OrdonanceController::class, 'show']);

// Route pour créer une nouvelle ordonnance
Route::post('/ordonnances', [OrdonanceController::class, 'store']);



Route::get('/medicaments/ordonnance/{ordonnance_id}', [OrdonnanceMedicamentController::class, 'show']);

// Route pour ajouter un médicament à une ordonnance
Route::post('/medicaments/ordonnance', [OrdonnanceMedicamentController::class, 'store']);




// Route pour obtenir la liste de tous les médecins
Route::get('/medecins', [MedecinController::class, 'index']);

// Route pour créer un nouveau médecin
Route::post('/medecins', [MedecinController::class, 'store']);

// Route pour mettre à jour un médecin existant
Route::put('/medecins/{medecin}', [MedecinController::class, 'update']);





Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
