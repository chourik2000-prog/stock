<?php

namespace App\Http\Controllers;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Annee;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function recherche(Request $request)
    {
        $annees = DB::table('annees')->get();
        
        // recupérer tous les articles
        $articles =  Article::all();

        if($request->id_annee) 
        {
            // selectionner les articles qui ont pour id_annee,id_annee que l'utilisateur choisi
            $anApps = Approvisionnement::where('id_annee',$request->id_annee);
            $anDemds = Demande::where('id_annee',$request->id_annee);
            $anPertes = Perte::where('id_annee',$request->id_annee);

            // faire le calcul pour chaque article avec une boucle foreach
            foreach($anApps as $anApp)
                    

            /*
                donnees = [
                    [
                       totalAppro => 0,
                       totalDemd => 0,
                       totalPerte => 0,
                       stock => 0,
                       pourcentage => 20
                    ],
                    [
                       totalAppro => 0,
                       totalDemd => 0,
                       totalPerte => 0,
                       stock => 0,
                       pourcentage => 90
                    ]
                ]
            */

            $totalAppro = Approvisionnement::where('id_annee', $request->id_annee)
                ->sum('qentrant');
            
            $totalDemd = Demande::where('id_annee', $request->id_annee)
                ->sum('qlivree');

            $totalPerte = Perte::where('id_annee', $request->id_annee)
                ->sum('qperdue');

            $stock = $totalAppro - $totalDemd - $totalPerte;

            return view('accueils.accueil')
                ->with('totalAppro', $totalAppro)
                ->with('totalDemd',  $totalDemd)
                ->with('totalPerte', $totalPerte)
                ->with('stock', $stock)
                ->with('articles',$articles);

        }
        return view('accueils.recherche')
        ->with('annees',$annees);
    }
    
}
