<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StatistiqueController extends Controller
{
   
     // Récupérer la liste des rendez-vous confirmés aujourd'hui
public function listerendezvousconfirmer()
{
    $today = now()->toDateString(); // Obtenez la date d'aujourd'hui au format YYYY-MM-DD

    $rendezvous = Rendezvous::where('confirme', true)
                             ->whereDate('dateRendezvs', $today)
                             ->with('patient')
                             ->get();

    return response()->json($rendezvous);
}

// Récupérer la liste des rendez-vous non confirmés aujourd'hui
public function listerendezvousnonconfirmer()
{
    $today = now()->toDateString(); // Obtenez la date d'aujourd'hui au format YYYY-MM-DD

    $rendezvous = Rendezvous::where('confirme', false)
                             ->whereDate('dateRendezvs', $today)
                             ->with('patient')
                             ->get();

    return response()->json($rendezvous);
}


// Récupérer la liste des rendez-vous confirmés demain
 public function listerendezvousconfirmerdemain()
    {
        $tomorrow = Carbon::tomorrow()->toDateString(); // Obtenez la date de demain au format YYYY-MM-DD

        $rendezvous = Rendezvous::where('confirme', true)
                                 ->whereDate('dateRendezvs', $tomorrow)
                                 ->with('patient')
                                 ->get();

        return response()->json($rendezvous);
    }




    // Récupérer la liste des rendez-vous non confirmés demain
 public function listerendezvousnonconfirmerdemain()
 {
     $tomorrow = Carbon::tomorrow()->toDateString(); // Obtenez la date de demain au format YYYY-MM-DD

     $rendezvous = Rendezvous::where('confirme', false)
                              ->whereDate('dateRendezvs', $tomorrow)
                              ->with('patient')
                              ->get();

     return response()->json($rendezvous);
 }







 public function revenuAujourdhui()
 {
     // Obtenez la date d'aujourd'hui au format YYYY-MM-DD
     $dateAujourdhui = now()->toDateString();
 
     // Calculez le revenu total pour les consultations d'aujourd'hui
     $revenuAujourdhui = Consultation::whereDate('Datecons', $dateAujourdhui)->sum('prix');
 
     // Retournez le revenu
     return $revenuAujourdhui;
 }
 

    // Méthode pour calculer le revenu pour hier
    public function revenuHier()
    {
        // Obtenez la date d'hier au format YYYY-MM-DD
        $dateHier = now()->subDay()->toDateString();
    
        // Calculez le revenu total pour les consultations d'hier
        $revenuHier = Consultation::whereDate('Datecons', $dateHier)->sum('prix');
    
        // Retournez le revenu
        return $revenuHier;
    }
    

    // Méthode pour calculer le revenu pour cette semaine
    public function revenuCetteSemaine()
    {
        // Obtenez la date du début et de fin de cette semaine au format YYYY-MM-DD
        $debutSemaine = Carbon::now()->startOfWeek()->toDateString();
        $finSemaine = Carbon::now()->endOfWeek()->toDateString();
    
        // Calculez le revenu total pour les consultations de cette semaine
        $revenuCetteSemaine = Consultation::whereBetween('Datecons', [$debutSemaine, $finSemaine])->sum('prix');
    
        // Retournez le revenu
        return $revenuCetteSemaine;
    }
    

    // Méthode pour calculer le revenu pour la semaine dernière
    public function revenuSemaineDerniere()
{
    $debutSemaineDerniere = Carbon::now()->subWeek()->startOfWeek()->toDateString();
    $finSemaineDerniere = Carbon::now()->subWeek()->endOfWeek()->toDateString();

    $revenuSemaineDerniere = Consultation::whereBetween('Datecons', [$debutSemaineDerniere, $finSemaineDerniere])->sum('prix');

    return $revenuSemaineDerniere;
}


    // Méthode pour calculer le revenu pour ce mois
    public function revenuCeMois()
    {
        $debutMois = Carbon::now()->startOfMonth()->toDateString();
        $finMois = Carbon::now()->endOfMonth()->toDateString();
    
        $revenuCeMois = Consultation::whereBetween('Datecons', [$debutMois, $finMois])->sum('prix');
    
        return $revenuCeMois;
    }
    

    // Méthode pour calculer le revenu pour le mois dernier
    public function revenuMoisDernier()
    {
        $debutMoisDernier = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $finMoisDernier = Carbon::now()->subMonth()->endOfMonth()->toDateString();
    
        $revenuMoisDernier = Consultation::whereBetween('Datecons', [$debutMoisDernier, $finMoisDernier])->sum('prix');
    
        return $revenuMoisDernier;
    }
    

    // Méthode pour calculer le revenu pour cette année
    public function revenuCetteAnnee()
    {
        $debutAnnee = Carbon::now()->startOfYear()->toDateString();
        $finAnnee = Carbon::now()->endOfYear()->toDateString();
    
        $revenuCetteAnnee = Consultation::whereBetween('Datecons', [$debutAnnee, $finAnnee])->sum('prix');
    
        return $revenuCetteAnnee;
    }
    

    // Méthode pour calculer le revenu pour l'année dernière
    public function revenuAnneeDerniere()
    {
        $debutAnneeDerniere = Carbon::now()->subYear()->startOfYear()->toDateString();
        $finAnneeDerniere = Carbon::now()->subYear()->endOfYear()->toDateString();
    
        $revenuAnneeDerniere = Consultation::whereBetween('Datecons', [$debutAnneeDerniere, $finAnneeDerniere])->sum('prix');
    
        return $revenuAnneeDerniere;
    }
    

    // Méthode générique pour calculer le revenu sur une plage de dates donnée
    private function revenuParPlageDeDates($start, $end)
    {
        return Consultation::whereBetween('Datecons', [$start, $end])->sum('prix');
    }







 
     // Récupérer le nombre de rendez-vous avec consultation insérée aujourd'hui et confirmés
     public function listerendezvousconsultationconfirme()
     {
         $today = now()->toDateString(); // Obtenez la date d'aujourd'hui au format YYYY-MM-DD
 
         $rendezvous = Rendezvous::where('confirme', true)
                                  ->whereDate('dateRendezvs', $today)
                                  ->whereHas('consultations')
                                  ->count();
 
         return response()->json($rendezvous);
     }
 
     // Récupérer le nombre de rendez-vous sans consultation insérée aujourd'hui et confirmés
     public function listerendezvousnoninsereconsultationconfirme()
     {
         $today = now()->toDateString(); // Obtenez la date d'aujourd'hui au format YYYY-MM-DD
 
         $rendezvous = Rendezvous::where('confirme', true)
                                  ->whereDate('dateRendezvs', $today)
                                  ->whereDoesntHave('consultations')
                                  ->count();
 
         return response()->json($rendezvous);
     }



}
