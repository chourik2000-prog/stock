<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use App\Models\Catego;
use App\Models\Agent;
use App\Models\Article;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Dompdf\Dompdf;

use Illuminate\Http\Request;

class PdfCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
                    $dompdf = new Dompdf();
                    $dompdf->loadHtml(view('conso_categories.pdf',compact('articlestocks')));
        
                    // (Optional) Setup the paper size and orientation
                    $dompdf->setPaper('A4', 'landscape');
                    $html ='<img src="logo-icon.png" alt="">';
        
        
                    // Render the HTML as PDF
                    $dompdf->render();
        
        
                    // Output the generated PDF to Browser
                    $dompdf->stream('conso_categories.pdf', ['Attachment' => false]);
                    exit();
                    // return view('conso_categories.pdf')
                    //     ->with('articlestocks', $articlestocks);
            }
        }
        return view('conso_categories.recherche')
            ->with('annees',$annees)
            ->with('categories',$categories);
    }
}
