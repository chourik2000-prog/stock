<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    use HasFactory;
    protected $table = 'approvisionnements';
    protected $fillable = [
        'libelle','fournisseur','quantite','date'
    ];
}
