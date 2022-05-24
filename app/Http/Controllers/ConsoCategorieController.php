<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use App\Models\Catego;
use App\Models\Agent;
use App\Models\Article;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsoCategorieController extends Controller
{
    public function recherche(Request $request)
    {
        
        $annees = DB::table('annees')->get();
        $categories = DB::table('categories')->get();
        
        // recupérer tous les articles
        $articles = DB::table('articles')
        ->orderBy('libelle', 'asc')
        ->get(); 
        $agents = DB::table('agents')->get();

        if($request->id_annee) 
        {
           if($request->idcat)
            {
                $articlestocks = [];
                $cat = Catego::find($request->input('idcat'));
                
                    foreach($articles as $article)
                    {
                        $livree = 0;
                        $date = 0;

                        // $demandes = Demande::whereIdArticle($article->id)
                        // ->where('id_agent',$request->id_agent)
                        // ->get();

                        // $demandes = Agent::where('idcat',$request->idcat)
                        //     ->with('demandes')->get();

                        // $demandes = Demande::whereIdArticle($article->id)
                        // ->with(['agent' => function($query) use ($request){
                        //     $query->select('idcat')->whereIdcat($request->idcat);
                        // }])->get();

                        $demandes = DB::table('agents')
                            ->join('demandes', 'agents.id', 'demandes.id_agent')
                            ->join('categories', 'agents.idcat','categories.id')
                            ->select('agents.nom','agents.prenom','demandes.qlivree','demandes.date')
                            ->where('categories.id', $request->idcat)
                            ->where('demandes.id_annee',$request->id_annee)
                            ->where('demandes.id_article',$article->id)
                            ->get();
                            

                        foreach($demandes as $demande)
                        {
                            $nom = $demande->nom;
                            $prenom = $demande->prenom;
                            $livree += $demande->qlivree;
                            $date = $demande->date;
                        } 
                        if($livree>0)
                        {
                            array_push
                                ($articlestocks, 
                                    [
                                        "nom" => $nom,
                                        "prenom" =>$prenom,
                                        "article" => $article->libelle , 
                                        "livree" => $livree,
                                        "date" => $date,
                                    ]
                                );
                        }
                    }
                return view('conso_categories.afficher')
                        ->with('cat',$cat)
                        ->with('articlestocks', $articlestocks);
            }
        }
        return view('conso_categories.recherche')
            ->with('annees',$annees)
            ->with('categories',$categories);
    }
}
