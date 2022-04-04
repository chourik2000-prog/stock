<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Approvisionnement;
use App\Models\Commande;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // chercher l'année active , qui a pour status = 1
        $anneeActive = Annee::where('status', 1)
        ->get([ 'id' ]);

        $anneeA = Annee::where('status', 1)
        ->get(['libelle']);

        // total des cmdes de l'anneeActive
        $totalCmdes = Commande::where('id_annee', $anneeActive)
        ->sum('quantite');
    
        $totalAppro = Approvisionnement::where('id_annee',$anneeActive)
        ->sum('qentrant');

        $totalDemd = Demande::where('id_annee',$anneeActive)
        ->sum('qlivree');
        
        $totalPerte = Perte::where('id_annee',$anneeActive)
        ->sum('qperdue');

        $totalCmdn = $totalCmdes - $totalAppro;


        return view('home',compact('totalCmdes'))
        ->with('totalCmdes',$totalCmdes)
        ->with('totalAppro',$totalAppro)
        ->with('totalDemd',$totalDemd)
        ->with('totalPerte',$totalPerte)
        ->with('totalCmdn',$totalCmdn)
        ->with('anneeActive',$anneeActive)
        ->with('anneeA',$anneeA);
    }
}
