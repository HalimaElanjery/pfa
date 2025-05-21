<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdonnanceMedicament extends Model
{
    use HasFactory;
    protected $table = 'ordonnances_medicaments';

    // Définition des attributs qui sont mass assignable
    protected $fillable = [
        'ordonnance_id', 
        'medicament_id'
];

    // Définition des relations avec Ordonnance et Medicament
    public function ordonnance()
    {
        return $this->belongsTo(Ordonance::class);
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }
}
