<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Annee;
use App\Models\Article;

class CommandeController extends Controller
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
        $commandes = Commande::all();
        return view('commandes.afficher',compact('commandes'))
        ->with('commandes', $commandes)
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
        $commande = Commande::all();
        return view('commandes.create')
        ->with('commande', $commande)
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
        $request->validate([
            'id_article' => 'required|exists:articles,id',
            'quantite' => 'required|numeric|min:0',
            'id_annee' => 'required|exists:annees,id',
        ]);
        Commande::create($request->all());
        return redirect()->route('commandes.index')
                ->with('success',"Bon enregistré avec succès.");
    }


    public function recherche(Request $request)
    {
        $annees = Annee::all();
        $articles = Article::all();

        if($request->id_annee) 
        {
           $commandes = Commande::where('id_annee', $request->id_annee)
                ->get();

            return view('commandes.afficher')
                ->with('commandes', $commandes)
                ->with('articles', $articles)
                ->with('annees', $annees);
        }

        return view('commandes.recherche')
        ->with('annees',$annees);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            'id_article' => 'required|exists:articles,id',
            'quantite' => 'required|numeric|min:0',
            'id_annee' => 'required|exists:annees,id',
        ]);
        $commande->update($request->all());

        return redirect()->route('commandes.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commandes.index')
                        ->with('success','suppression avec succès');
    }
}
