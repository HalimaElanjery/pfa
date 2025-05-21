<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'rendezvous_id',
        'Datecons',
        'poid',
        'taille',
        'prix',
        'EtatPatient',
        'HTA',
        'maladie',
        'TraitementRecommande',
    ];

    // Relation vers Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    // Une consultation appartient à un ordonance
    public function ordonance()
    {
        return $this->belongsTo(Ordonance::class);
    }

    // Une consultation est liée à un rendez-vous
    public function rendezvous()
    {
        return $this->belongsTo(Rendezvous::class);
    }

    /*
    public function rendezvous()
    {
        return $this->belongsTo(Rendezvous::class, 'rendezvous_id');
    }
*/

}
