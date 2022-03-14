<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Demande;
use App\Models\Perte;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $annees = Annee::all();
        $articles = Article::all();
        $fournisseurs = Fournisseur::all();
        $approvisionnements = Approvisionnement::all();
        return view('approvisionnements.afficher',compact('approvisionnements'))
        ->with('fournisseurs', $fournisseurs)
        ->with('articles', $articles)
        ->with('annees', $annees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anne = Annee::all();
        $four = Fournisseur::all();
        $cat = Article::all();
        return view('approvisionnements.create')
        ->with('four', $four)
        ->with('cat', $cat)
        ->with('anne', $anne);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
     $qentrant = DB::table('approvisionnements')->where('id_article',$request->input('id_article'))->sum('qentrant');
     $qlivree = DB::table('demandes')->where('id_article',$request->input('id_article'))->sum('qlivree');
     $perte = DB::table('pertes')->where('id_article',$request->input('id_article'))->sum('qperdue');
     $qexistant = $qentrant - $qlivree - $perte ; 
    Approvisionnement::create([
        'id_article' => $request->input('id_article'),
        'id_fournisseur' => $request->input('id_fournisseur'),
        'qentrant' => $request->input('qentrant'),
        'date' => $request->input('date'),
        'qexistant' => $qexistant,
        'id_annee'  => $request->input('id_annee'),
    ]);

    return redirect()->route('approvisionnements.index')
                    ->with('success',"L'article est enregistré avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function show(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Approvisionnement $approvisionnement)
    {
        return view('approvisionnements.modifier',compact('approvisionnement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approvisionnement $approvisionnement)
    {
        $request->validate([
            'qentrant' => 'required',
            'date' => 'required',
        ]);
        $approvisionnement->update($request->all());
    
        return redirect()->route('approvisionnements.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approvisionnement $approvisionnement)
    {
        $approvisionnement->delete();
        return redirect()->route('approvisionnements.index')
                        ->with('success','suppression avec succès');
    }
}
