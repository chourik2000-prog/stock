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
        
        // recupérer tous les articles
         $articles =  Article::all();  

        if($request->id_annee) 
        {
            // déclaration d'un tableau vide
            $articlestocks = [];

            foreach($articles as $article)
            {
                // initialisation des valeurs 
                $cmd = 0;
                $entree = 0;
                $diff =0;

                // recupération des articles qui sont dans approvisionnements et qui sont dans l'année choisie
                $approvisionnements = Approvisionnement::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();

                // parcourir les aprovisionnement et faire la somme 
                foreach($approvisionnements as $approvisionnement)
                {
                    $entree += $approvisionnement->qentrant;
                }  

                $commandes = Commande::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();
              
                foreach($commandes as $commande)
                {
                    $cmd += $commande->quantite;
                }   
    
                $diff = $cmd - $entree;
               
                // remplissage du tableau
                if($entree>0){
                    array_push
                        ($articlestocks, 
                            [
                                "article" => $article->libelle , 
                                "cmd" => $cmd,
                                "entree" => $entree,
                                "diff" => $diff,

                            ]
                        );
                }
            }
           
            return view('stocks.afficher')
        ->with('articlestocks', $articlestocks);

        // 
        }
        return view('stocks.recherche')
        ->with('annees',$annees);
    }
   
}
