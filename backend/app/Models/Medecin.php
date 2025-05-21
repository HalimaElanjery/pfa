<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomMedecin', 'PrenomMedecin', 'Specialite', 'NumTele', 'Adresse'
    ];


    // Un médecin a de nombreuses ordonnances
    public function ordonnances()
    {
        return $this->hasMany(Ordonance::class);
    }

    // Un médecin peut avoir de nombreuses consultations (s'il est supposé créer des consultations)
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
