<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajustement extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantite', 'motif', 'idAppro'
    ];

}
