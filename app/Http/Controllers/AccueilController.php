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
        $annees = Annee::all();
        
        // recupérer tous les articles
        $articles =  Article::all();  

        if($request->id_annee) 
        {
            $tableau = [];

            foreach($articles as $article)
            {
                $si = 0;
                $entree = 0;
                $livree = 0;
                $perdue = 0;
            
            // selectionner les articles qui ont pour id_annee,id_annee que l'utilisateur choisi
                $approvisionnements = Approvisionnement::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();
                
                $demandes = Demande::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();

                $pertes = Perte::whereIdArticle($article->id)
                ->where('id_annee',$request->id_annee)
                ->get();
            }
            // parcourir les aprovisionnement et faire la somme 
            foreach($approvisionnements as $approvisionnement)
            {
                $entree += $approvisionnement->qentrant;
            }  
            
            foreach($demandes as $demande)
            {
                $livree += $demande->qlivree;
            }   

            foreach($pertes as $perte)
            {
                $perdue += $perte->qperdue;
            }   

            $stocktotal = $si + $entree;
            $stockfinal = $stocktotal - $livree - $perdue;

            $tableau = ['$entree', '$livree', '$perdue', '$stocktotal', '$stockfinal'];
            return view('accueils.accueil')
                ->with('stocktotal', $stocktotal)
                ->with('stockfinal', $stockfinal)
                ->with('si', $si)
                ->with('entree', $entree)
                ->with('livree', $livree)
                ->with('perdue', $perdue)
                ->with('articles',$articles);

        }
        return view('accueils.recherche')
        ->with('annees',$annees);
    }
}