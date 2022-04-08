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
        // $articles=DB::table('approvisionnements')
        //     ->leftJoin('articles', 'articles.id', '=', 'approvisionnements.id_article')	
        //     ->select('approvisionnements.*','articles.*')
        //     ->get();

        if($request->id_annee) 
        {
            $articlestocks = [];

            foreach($articles as $article)
            {
                $si = 0;
                $entree = 0;
                $livree = 0;
                $perdue = 0;
                $stocktotal =0;
                $stockfinal = 0;

                $approvisionnements = Approvisionnement::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();

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
            
            // selectionner les articles qui ont pour id_annee,id_annee que l'utilisateur choisi
               

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
            // parcourir les aprovisionnement et faire la somme 
           

            return view('accueils.accueil')
        ->with('articlestocks', $articlestocks);

        }
       
        return view('accueils.recherche')
        ->with('annees',$annees);
    }
}