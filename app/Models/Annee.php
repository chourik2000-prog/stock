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
        protected $fillable = ['libelle', 'dateDebut', 'dateFin'];
        protected $casts = ['status' => 'boolean'];
     

        public function approvisionnements(){
        return $this->hasMany(Approvisionnement::class, 'id_annee');
    }
        public function pertes(){
        return $this->hasMany(Perte::class, 'id_annee');
    }
        public function demandes(){
        return $this->hasMany(Demande::class, 'id_annee');
    }
}
