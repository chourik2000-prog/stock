<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perte extends Model
{
    use HasFactory;
    protected $table = 'pertes';
    protected $fillable = [
        'id_article', 'qperdue','date'
    ];
    public function article(){
        return $this->belongsTo(Article::class ,'id_article'); 
    }
}
