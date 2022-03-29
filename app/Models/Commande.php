<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $fillable = [
        'quantite','id_article', 'id_annee'
    ];
    
    public function article(){
        return $this->belongsTo(Article::class ,'id_article'); 
    }

    public function annee(){
        return $this->belongsTo(Annee::class ,'id_annee'); 
    }
}
