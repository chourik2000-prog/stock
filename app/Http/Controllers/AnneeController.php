<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = Auth::user()->role->name;
        $annees = Annee::all();
        return view('annees.afficher',compact('annees'))
            ->with('annees', $annees)
            ->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
            
        ]);
            
        $annees = new Annee; 
        $annees->dateDebut = $request->dateDebut;
        $annees->dateFin = $request->dateFin;
        $annees->status = $request->input('status') ? true : false;
        $annees->save();
        
        // recupérer l'id de ll'année dernière
            $id=$annees->id;
            //  dd($id);
            $id1 = $id-1;
            $id2 = $id-2;
            $articles = DB::table('articles')
            ->orderBy('libelle', 'asc')
            ->get();
            foreach($articles as $article)
            {
                if ($id == 2) {
                    $si = 0;
                } else {   
                    $si = DB::table('sistocks')->where('idstock',$id2)->where('libelle',$article->libelle)
                                ->pluck('stockfinal')->first();
                }
                // initialisation des valeurs 
                $entree = 0;
                $livree = 0;
                $perdue = 0;
                $stocktotal =0;
                $stockfinal = 0;
                
                // recupération des articles qui sont dans approvisionnements et qui sont dans l'année choisie
                $approvisionnements = Approvisionnement::whereIdArticle($article->id)
                ->where('id_annee',$id1)
                ->get();
                
                // parcourir les approvisionnement et faire la somme 
                foreach($approvisionnements as $approvisionnement)
                {
                    $entree += $approvisionnement->qentrant;
                }  
                
                $demandes = Demande::whereIdArticle($article->id)
                ->where('id_annee',$id1)
                ->get();
                
                foreach($demandes as $demande)
                {
                    $livree += $demande->qlivree;
                }   

                $pertes = Perte::whereIdArticle($article->id)
                ->where('id_annee',$id1)
                ->get();
                
                foreach($pertes as $perte)
                {
                    $perdue += $perte->qperdue;
                }   
                $stocktotal = $si + $entree;
                $stockfinal = $stocktotal - ($livree + $perdue);
               
                // remplissage du tableau
                 DB::table('sistocks')->insert([
                        'libelle' => $article->libelle,
                        'stockfinal' => $stockfinal,
                        'idstock' => $id1,
                    ]);
            }
            return redirect()->route('annees.index')
                ->with('success',"Année enregistré avec succès.");
}

    public function date(Request $request , $id)
    {
        $annees = Annee::all();
            return  redirect()->route('datean');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function show(Annee $annee)
    {
        return view('annees.voir',compact('annee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function edit(Annee $annee)
    {
        return view('annees.modifier',
        compact('annee'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annee $annee)
    {
        $request->validate([
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
            
        ]);

        $annee->update($request->all());
    
        return redirect()->route('annees.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annee $annee)
    {
        $annee->delete();
        return redirect()->route('annees.index')
                        ->with('success','suppression avec succès');
    }
}
