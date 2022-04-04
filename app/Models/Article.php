<?php

namespace App\Models;
use App\Models\Approvisionnement;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle', 'caracteristique'
    ];
    
    public function approvisionnements (){
        return $this->hasMany(Approvisionnement::class, 'id_article');
    }

    public function demandes(){
        return $this->hasMany(Demande::class, 'id_article');
    }
    public function pertes(){
        return $this->hasMany(Perte::class, 'id_article');
    }
}
