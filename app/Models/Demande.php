<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $table = 'demandes';
    protected $fillable = [
        'qlivree' ,'date','id_agent', 'id_article' , 'id_annee'
    ];
    public function article(){
        return $this->belongsTo(Article::class ,'id_article'); 
    }

    public function agent(){
        return $this->belongsTo(Agent::class ,'id_agent'); 
    }
    public function annee(){
        return $this->belongsTo(Annee::class ,'id_annee'); 
    }
}
