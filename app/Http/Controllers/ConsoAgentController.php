<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use App\Models\Agent;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsoAgentController extends Controller
{
    public function recherche(Request $request)
    {
        $annees = DB::table('annees')->get();
        $agents = DB::table('agents')->get();
        
        // recupérer tous les articles
        $articles = DB::table('articles')
        ->orderBy('libelle', 'asc')
        ->get(); 

        if($request->id_annee) 
        {
           if($request->id_agent)
           {
            $demandeurs = Agent::find($request->input('id_agent'));
            
            foreach($articles as $article)
            {
                $livree = 0;
                $date = 0;

                $demandes = Demande::whereIdArticle($article->id)
                ->where('id_agent',$request->id_agent)
                ->get();

                foreach($demandes as $demande)
                {
                    $livree += $demande->qlivree;
                    $date = $demande->date;
                } 
            }
           
            return view('conso_agents.afficher')
                ->with('livree',$livree)
                ->with('date',$date)
                ->with('demandes',$demandes)
                ->with('demandeurs',$demandeurs);

            }
        }
        return view('conso_agents.recherche')
            ->with('annees',$annees)
            ->with('agents',$agents);
    }
}
