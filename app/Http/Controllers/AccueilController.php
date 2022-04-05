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
        $accueils = Article::all();

        $an = $request->id_annee;
 
        if($an) 
        {
            $totalAppro = Approvisionnement::where('id_annee',$an)
                ->sum('qentrant');
            
            $totalDemd = Demande::where('id_annee',$an)
                ->sum('qlivree');

            $totalPerte = Perte::where('id_annee',$an)
                ->sum('qperdue');

            $stock = $totalAppro - $totalDemd - $totalPerte;

            return view('accueils.accueil')
                ->with('totalAppro', $totalAppro)
                ->with('totalDemd',  $totalDemd)
                ->with('totalPerte', $totalPerte)
                ->with('stock', $stock)
                ->with('accueils',$accueils);

        }
        return view('accueils.recherche')
        ->with('annees',$annees);
    }
    
}
