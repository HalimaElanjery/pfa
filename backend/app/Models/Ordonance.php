<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonance extends Model
{
    use HasFactory;

    protected $table = 'ordonnances';

    protected $fillable = [
        'consultation_id',
        'dateOrdonance',
        'NoteMedicale',
    ];


    // Une ordonnance peut inclure plusieurs médicaments

    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class, 'ordonnances_medicaments', 'ordonnance_id', 'medicament_id');
    }

    // Une ordonnance peut être liée à une consultation

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }

}
