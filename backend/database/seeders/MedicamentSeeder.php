<?php

namespace Database\Seeders;
use App\Models\Medicament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicamentSeeder extends Seeder
{
    public function run()
    {
        Medicament::create([
            'NomMedica' => 'Amoxicilline',
            'DescriptionMedic' => 'Antibiotique utilisé pour traiter diverses infections bactériennes.',
            'FormMedic' => 'Capsule',
            'EffetSecondaire' => 'Nausées, éruptions cutanées, diarrhée.'
        ]);

        Medicament::create([
            'NomMedica' => 'Ibuprofène',
            'DescriptionMedic' => 'Anti-inflammatoire non stéroïdien utilisé pour soulager la douleur et réduire la fièvre.',
            'FormMedic' => 'Pill',
            'EffetSecondaire' => 'Maux d’estomac, saignements gastro-intestinaux.'
        ]);

        Medicament::create([
            'NomMedica' => 'Paracétamol',
            'DescriptionMedic' => 'Utilisé pour traiter la douleur mineure et réduire la fièvre.',
            'FormMedic' => 'Liquid',
            'EffetSecondaire' => 'Rarement, réactions allergiques graves.'
        ]);

        Medicament::create([
            'NomMedica' => 'Metformine',
            'DescriptionMedic' => 'Médicament pour le traitement du diabète de type 2.',
            'FormMedic' => 'Pill',
            'EffetSecondaire' => 'Nausées, troubles digestifs.'
        ]);

        Medicament::create([
            'NomMedica' => 'Cétirizine',
            'DescriptionMedic' => 'Antihistaminique utilisé pour traiter les allergies.',
            'FormMedic' => 'Pill',
            'EffetSecondaire' => 'Somnolence, sécheresse de la bouche.'
        ]);
    }
}
