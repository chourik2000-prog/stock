<?php

namespace App\Models;
use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['libelle'];

    public function agents(){
    return $this->hasMany(Agent::class, 'idcat');
}
}
