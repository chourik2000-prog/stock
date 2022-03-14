<?php

namespace App\Models;
use App\Models\Approvisionnement;
use App\Models\Perte;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
        use HasFactory;
        protected $table = 'annees';
        protected $fillable = ['libelle', 'dateDebut', 'dateFin', 'status'];

        public function approvisionnements(){
        return $this->hasMany(Agent::class, 'idcat');
    }
        public function pertes(){
        return $this->hasMany(Agent::class, 'idcat');
    }
        public function demandes(){
        return $this->hasMany(Agent::class, 'idcat');
    }
}
