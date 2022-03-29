<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Annee;
use App\Models\Approvisionnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annees = Annee::all();
        $fournisseurs = Fournisseur::simplePaginate(6);
    return view('fournisseurs.afficher',compact('fournisseurs'))->with('annees', $annees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseurs.create');
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
            'nom' => 'required|max:255',
            'contact' => 'required|min:8',
        ]);
        Fournisseur::create($request->all());
        return redirect()->route('fournisseurs.index')
                        ->with('success',"Fournisseur enregistré avec succès.");

        // $data = new Fournisseur([
        //     'nom' => $request->get('nom'),
        //     'contact' => $request->get('contact')
        // ]);
        // $data->save();
        // return redirect()->route('fournisseurs.index')
        //                 ->with('success',"L'article est enregistré avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('fournisseurs.voir',compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.modifier',compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom' => 'required|max:100',
            'contact' => 'required|min:8',
        ]);
        $fournisseur->update($request->all());
    
        return redirect()->route('fournisseurs.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseurs.index')
                        ->with('success','suppression avec succès');
    }
}
