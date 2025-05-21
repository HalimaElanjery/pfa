<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('rendezvous_id')->constrained('rendezvous')->onDelete('cascade');
            $table->date('Datecons');
            $table->string('poid');
            $table->string('taille');
            $table->float('prix');
            $table->string('EtatPatient');
            $table->string('HTA');
            $table->string('maladie');
            $table->string('TraitementRecommande');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
