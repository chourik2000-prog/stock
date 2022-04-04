<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Fournisseur;
use App\Models\Annee;

class Approvisionnement extends Model
{
    use HasFactory;
    protected $table = 'approvisionnements';
    protected $fillable = [
        'id_article', 'id_fournisseur','qentrant','date', 'id_annee'
    ];
    public function article() {
        return $this->belongsTo(Article::class ,'id_article'); 
    }
    public function fournisseur() {
        return $this->belongsTo(Fournisseur::class ,'id_fournisseur'); 
    }
    public function annee() {
        return $this->belongsTo(Annee::class ,'id_annee'); 
    }
}
