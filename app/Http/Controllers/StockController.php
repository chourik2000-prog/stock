<?php

namespace App\Http\Controllers;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Demande;
use App\Models\Annee;
use App\Models\Commande;
use App\Models\Perte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function recherche(Request $request)
    {
        $annees = DB::table('annees')->get();
        $stocks = Article::all();

        $an = $request->id_annee;

        if($an) {
            $totalCmdes = Commande::where('id_annee', $an)
                ->sum('quantite');

            $totalAppro = Approvisionnement::where('id_annee',$an)
                ->sum('qentrant');

            $diff = $totalCmdes - $totalAppro;

            return view('stocks.afficher')
                ->with('totalCmdes', $totalCmdes)
                ->with('totalAppro', $totalAppro)
                ->with('diff', $diff)
                ->with('stocks', $stocks)
                ->with('annees', $annees);
        }
        return view('stocks.recherche')
        ->with('annees',$annees);
    }
   
}
