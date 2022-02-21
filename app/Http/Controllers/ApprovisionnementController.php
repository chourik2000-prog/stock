<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $fournisseurs = Fournisseur::all();
        $approvisionnements = approvisionnement::latest()->get();
        return view('approvisionnements.afficher',compact('approvisionnements'))->with('fournisseurs', $fournisseurs)->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $four = Fournisseur::all();
        $cat = Article::all();
        return view('approvisionnements.create')->with('four', $four)->with('cat', $cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Approvisionnement([
            'id_article' => $request->get('id_article'),
            'id_fournisseur' => $request->get('id_fournisseur'),
            'qexistant' => $request->get('qexistant'),
            'qentrant' => $request->get('qentrant'),
            'date' => $request->get('date')
           
        ]);
        $data->save();
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
            'qexistant' => 'required',
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
