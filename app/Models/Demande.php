<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $table = 'demandes';
    protected $fillable = [
        'id_article' ,'qlivree' ,'date'
    ];
    public function article(){
        return $this->belongsTo(Article::class ,'id_article'); 
    }
}
