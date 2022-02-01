<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class Agent extends Model
{
    use HasFactory;

    protected $table = "agents";


    public function categorie(){
        return $this->belongsTo(Categorie::class, 'idcat');
    }
}
