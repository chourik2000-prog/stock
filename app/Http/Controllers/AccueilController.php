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
            // déclaration d'un tableau vide
            $articlestocks = [];

            foreach($articles as $article)
            {
                // initialisation des valeurs 
                $si = 0;
                $entree = 0;
                $livree = 0;
                $perdue = 0;
                $stocktotal =0;
                $stockfinal = 0;

                // recupération des articles qui sont dans approvisionnements et qui sont dans l'année choisie
                $approvisionnements = Approvisionnement::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();

                // parcourir les aprovisionnement et faire la somme 
                foreach($approvisionnements as $approvisionnement)
                {
                    $entree += $approvisionnement->qentrant;
                }  

                $demandes = Demande::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();
              
                foreach($demandes as $demande)
                {
                    $livree += $demande->qlivree;
                }   

                $pertes = Perte::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();
                
                foreach($pertes as $perte)
                {
                    $perdue += $perte->qperdue;
                }   
    
                $stocktotal = $si + $entree;
                $stockfinal = $stocktotal - $livree - $perdue;
               
                // remplissage du tableau
                if($entree>0){
                    array_push
                    ($articlestocks, 
                        [
                            "article" => $article->libelle , 
                            "si" => $si,
                            "entree" => $entree,
                            "stocktotal" => $stocktotal,
                            "livree" => $livree,
                            "perdue" => $perdue,
                            "stockfinal" => $stockfinal,

                        ]
                    );
                }
            }
           
            return view('accueils.accueil')
        ->with('articlestocks', $articlestocks);

        }
       
        return view('accueils.recherche')
        ->with('annees',$annees);
    }

}