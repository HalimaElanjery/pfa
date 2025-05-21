<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;

    protected $table = 'rendezvous';

    protected $fillable = [
        'patient_id',
        'dateRendezvs',
        'confirme',
    ];


    // Un rendez-vous appartient à un patient et à un secrétaire
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function secretaire()
    {
        return $this->belongsTo(Secretaire::class);
    }

    // Un rendez-vous peut avoir une ou plusieurs consultations
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
