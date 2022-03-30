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
    public function index(Request $request)
    {
        $annees = Annee::all();
        $articles = Article::all();
        $fournisseurs = Fournisseur::all();
        $approvisionnements = Approvisionnement::simplePaginate(6);
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


    public function recherche(Request $request)
    {
        $annees = DB::table('annees')->get();
        $articles = Article::all();
        $fournisseurs = Fournisseur::all();
        $approvisionnements = Approvisionnement::query();
        if($request->id_annee) {
            $approvisionnement = $approvisionnements->whereIdAnnee($request->id_annee);
            $approvisionnement = $approvisionnement->get();
            return view('approvisionnements.afficher')
            ->with('approvisionnements',$approvisionnement)
            ->with('articles',$articles)
            ->with('fournisseurs',$fournisseurs)
            ->with('annees',$annees);
        }
 
        return view('approvisionnements.recherche')
        ->with('annees',$annees);
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
            'id_article' => 'required|exists:articles,id',
            'id_fournisseur' => 'required|exists:fournisseurs,id',
            'qentrant' => 'required|numeric|min:0',
            'date' => 'required|date',
            'id_annee' => 'required|exists:annees,id',
        ]);

        $annee = DB::table('annees')
            ->where('id', $request->input('id_annee'))
            ->first();

        $dateDebut = $annee->dateDebut;
        $dateFin = $annee->dateFin;
        $date = $request->input('date');
        
        $dateDebut = Carbon::createFromFormat('Y-m-d', $dateDebut);
        $dateFin = Carbon::createFromFormat('Y-m-d',  $dateFin);
        $date = Carbon::createFromFormat('Y-m-d',  $date);
            
        $check = $date->between($dateDebut, $dateFin);
        if($check)
        {
            Approvisionnement::create($request->all());
            
            return redirect()->route('approvisionnements.index')
                        ->with('success',"L'article est enregistré avec succès.");
        }
        else {
            flash("La date doit être comprise dans l'année académique")->error();

            return redirect()->route('approvisionnements.index');
        }

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
            'id_article' => 'required|exists:articles,id',
            'id_fournisseur' => 'required|exists:fournisseurs,id',
            'qentrant' => 'required|numeric|min:0',
            'date' => 'required|date',
            'id_annee' => 'required|exists:annees,id',
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
