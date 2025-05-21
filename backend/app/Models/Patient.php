<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomPatient',
        'prenomPatient',
        'sexe',
        'adresse',
        'DateNaissance',
        'situationF',
        'assurance',
    ];
    

  /*  public function ordonances()
    {
        return $this->hasMany(Ordonance::class);
    }*/

     // Relation vers Ordonances via Consultations
     public function ordonances()
     {
         return $this->hasManyThrough(Ordonance::class, Consultation::class, 'patient_id', 'consultation_id');
     }

    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function secretaire()
    {
        return $this->belongsTo(Secretaire::class);
    }
}
