<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    use HasFactory;
    protected $table = 'approvisionnements';
    protected $fillable = [
        'id_article', 'fournisseur','quantite','date'
    ];
    public function article(){
        return $this->belongsTo(Article::class ,'id_article'); 
    }
}
