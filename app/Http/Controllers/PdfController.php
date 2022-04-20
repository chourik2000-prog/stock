<?php
// namespace App\Http\Controllers;
require_once 'dompdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// use App\Models\Approvisionnement;
// use App\Models\Article;
// use App\Models\Annee;
// use App\Models\Demande;
// use App\Models\Perte;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use PDF;

$dompdf = new Dompdf();
$dompdf->loadHtml("<h1>bonjour</h1>");
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream();



// class PdfController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function recherche(Request $request)
//     {
//         $annees = DB::table('annees')->get();
        
//         // recupérer tous les articles
//          $articles =  Article::all();  

//         if($request->id_annee) 
//         {
//             // déclaration d'un tableau vide
//             $articlestocks = [];

//             foreach($articles as $article)
//             {
//                 // initialisation des valeurs 
//                 $si = 0;
//                 $entree = 0;
//                 $livree = 0;
//                 $perdue = 0;
//                 $stocktotal =0;
//                 $stockfinal = 0;

//                 // recupération des articles qui sont dans approvisionnements et qui sont dans l'année choisie
//                 $approvisionnements = Approvisionnement::whereIdArticle($article->id)
//                 ->where('id_annee',$request->id_annee)
//                 ->get();

//                 // parcourir les aprovisionnement et faire la somme 
//                 foreach($approvisionnements as $approvisionnement)
//                 {
//                     $entree += $approvisionnement->qentrant;
//                 }  

//                 $demandes = Demande::whereIdArticle($article->id)
//                 ->where('id_annee',$request->id_annee)
//                 ->get();
              
//                 foreach($demandes as $demande)
//                 {
//                     $livree += $demande->qlivree;
//                 }   

//                 $pertes = Perte::whereIdArticle($article->id)
//                 ->where('id_annee',$request->id_annee)
//                 ->get();
                
//                 foreach($pertes as $perte)
//                 {
//                     $perdue += $perte->qperdue;
//                 }   
    
//                 $stocktotal = $si + $entree;
//                 $stockfinal = $stocktotal - $livree - $perdue;
               
//                 // remplissage du tableau
//                 if($entree>0){
//                     array_push
//                     ($articlestocks, 
//                         [
//                             "article" => $article->libelle , 
//                             "si" => $si,
//                             "entree" => $entree,
//                             "stocktotal" => $stocktotal,
//                             "livree" => $livree,
//                             "perdue" => $perdue,
//                             "stockfinal" => $stockfinal,

//                         ]
//                     );
//                 }
//             }
           
//             return view('accueils.pdf')
//         ->with('articlestocks', $articlestocks);

//         }  
//         return view('accueils.recherche')
//         ->with('annees',$annees); 
//     }

//     public function downloadPDF(Request $request)
//     {
//         $annees = DB::table('annees')->get();
        
//         // recupérer tous les articles
//         $articles =  Article::all();  
//         if($request->id_annee) 
//         {
//             // déclaration d'un tableau vide
//             $articlestocks = [];

//             foreach($articles as $article)
//             {
//                 // initialisation des valeurs 
//                 $si = 0;
//                 $entree = 0;
//                 $livree = 0;
//                 $perdue = 0;
//                 $stocktotal =0;
//                 $stockfinal = 0;

//                 // recupération des articles qui sont dans approvisionnements et qui sont dans l'année choisie
//                 $approvisionnements = Approvisionnement::whereIdArticle($article->id)
//                 ->where('id_annee',$request->id_annee)
//                 ->get();

//                 // parcourir les approvisionnements et faire la somme 
//                 foreach($approvisionnements as $approvisionnement)
//                 {
//                     $entree += $approvisionnement->qentrant;
//                 }  
//                 // parcourir les bésoins et faire la somme
//                 $demandes = Demande::whereIdArticle($article->id)
//                 ->where('id_annee',$request->id_annee)
//                 ->get();
              
//                 foreach($demandes as $demande)
//                 {
//                     $livree += $demande->qlivree;
//                 }   

//                 $pertes = Perte::whereIdArticle($article->id)
//                 ->where('id_annee',$request->id_annee)
//                 ->get();
                
//                 foreach($pertes as $perte)
//                 {
//                     $perdue += $perte->qperdue;
//                 }   
    
//                 $stocktotal = $si + $entree;
//                 $stockfinal = $stocktotal - $livree - $perdue;
               
//                 // remplissage du tableau
//                 if($entree>0){
//                     array_push
//                     ($articlestocks, 
//                         [
//                             "article" => $article->libelle , 
//                             "si" => $si,
//                             "entree" => $entree,
//                             "stocktotal" => $stocktotal,
//                             "livree" => $livree,
//                             "perdue" => $perdue,
//                             "stockfinal" => $stockfinal,

//                         ]
//                     );
//                 }
//             }
           
//             $pdf = PDF::loadView('accueils.accueil');

//             // download pdf file
//             return $pdf->download('accueils.accueil')->with('articlestocks', $articlestocks);
//         }

//     }

// }