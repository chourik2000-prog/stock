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
                $articlestocks = [];
                $demandeurs = Agent::find($request->input('id_agent'));
            
            foreach($articles as $article)
            {
                $livree = 0;
                $date = 0;

                $demandes = Demande::whereIdArticle($article->id)
                ->where('id_agent',$request->id_agent)
                ->where('id_annee',$request->id_annee)
                ->get();

                foreach($demandes as $demande)
                {
                    $livree += $demande->qlivree;
                    $date = $demande->date;
                } 
                if($livree>0)
                {
                    array_push
                        ($articlestocks, 
                            [
                                "article" => $article->libelle , 
                                "livree" => $livree,
                                "date" => $date,
                            ]
                        );
                }
            } 

            return view('conso_agents.afficher')
                ->with('demandeurs',$demandeurs)
                ->with('articlestocks', $articlestocks);
            }
        }

        return view('conso_agents.recherche')
            ->with('annees',$annees)
            ->with('agents',$agents);
    }
}
