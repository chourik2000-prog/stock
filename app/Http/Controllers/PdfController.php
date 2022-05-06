<?php

namespace App\Http\Controllers;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Annee;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $annees = DB::table('annees')->get();
        
        // recupérer tous les articles et les classer par ordre alphabétique
        $articles = DB::table('articles')
                ->orderBy('libelle', 'asc')
                ->get();

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

                // parcourir les approvisionnement et faire la somme 
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
            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml(view('pdfs.pdf',compact('articlestocks')));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');
            $html ='<img src="logo-icon.png" alt="">';


            // Render the HTML as PDF
            $dompdf->render();


            // Output the generated PDF to Browser
            $dompdf->stream('pdfs.pdf', ['Attachment' => false]);
            return view('pdfs.pdf')
                ->with('articlestocks', $articlestocks);
        } 
        return view('pdfs.recherche')
        ->with('annees',$annees);
    }

}