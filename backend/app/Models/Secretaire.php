<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaire extends Model
{
    use HasFactory;

    protected $fillable = ['nomSec', 'prenomSec', 'NumTele', 'Adress'];


     // Un secrétaire a de nombreux patients et de nombreux rendez-vous
     public function patients()
     {
         return $this->hasMany(Patient::class);
     }
 
     public function rendezvous()
     {
         return $this->hasMany(Rendezvous::class);
     }
}
