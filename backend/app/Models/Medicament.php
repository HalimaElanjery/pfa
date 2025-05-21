<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomMedica',
        'DescriptionMedic',
        'FormMedic',
        'EffetSecondaire',
    ];

    // Un médicament peut être prescrit dans plusieurs ordonnances
    public function ordonnances()
    {
        return $this->belongsToMany(Ordonance::class, 'ordonnances_medicaments');
    }



    
}
