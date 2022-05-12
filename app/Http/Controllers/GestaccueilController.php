<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use App\Models\Approvisionnement;
use App\Models\Commande;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class GestaccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // chercher l'année active , qui a pour status = 1
        $anneeActive = Annee::where('status', 1)
        ->value('id');

        if($anneeActive)
        {
            // format mois annee
            $dateDebut = Annee::where('status', 1)
            ->value('dateDebut');

            $dateFin = Annee::where('status', 1)
            ->value('dateFin');
            
            $monthd = Carbon::createFromFormat('Y-m-d',$dateDebut)->locale('fr_FR')
            ->isoformat('MMMM');
            $yeard = Carbon::createFromFormat('Y-m-d',$dateDebut)->year;

            $monthf = Carbon::createFromFormat('Y-m-d',$dateFin)->locale('fr_FR')
            ->isoformat('MMMM');
            $yearf = Carbon::createFromFormat('Y-m-d',$dateFin)->year;

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
            $stock = $totalAppro - $totalDemd - $totalPerte;

            return view('home',compact('totalCmdes'))
            ->with('totalCmdes', $totalCmdes)
            ->with('totalAppro', $totalAppro)
            ->with('totalDemd', $totalDemd)
            ->with('totalPerte', $totalPerte)
            ->with('totalCmdn', $totalCmdn)
            ->with('anneeActive', $anneeActive)
            ->with('stock', $stock)
            ->with('monthd', $monthd)
            ->with('yeard',$yeard)
            ->with('monthf',$monthf)
            ->with('yearf',$yearf);
        }
        else
        {
            $annees = Annee::all();
            return view('annees.afficher',compact('annees'))->with('annees', $annees);
        }
        
    }

   
}
