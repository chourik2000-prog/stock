<?php

namespace App\Models;
use App\Models\Demande;
use App\Models\Catego;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = "agents";
    protected $fillable = ['nom' ,'prenom', 'idcat'];

    public function categorie(){
        return $this->belongsTo(Catego::class ,'idcat'); 
    }
    public function demandes(){
        return $this->hasMany(Demande::class, 'id_agent');
    }
}