<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Demande;
use App\Models\Article;
use App\Models\Agent;
use App\Models\Annee;
use Illuminate\Http\Request;

class DemandeController extends Controller
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
        $agents = Agent::all();
        $demandes = demande::all();
        return view('demandes.afficher',compact('demandes'))
        ->with('articles', $articles)
        ->with('agents', $agents)
        ->with('annees', $annees);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $annees = Annee::all();
        $cat = Demande::all();
        return view('demandes.create')
        ->with('cat', $cat)
        ->with('annees', $annees);
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
            'id_agent' => 'required',
            'id_article' => 'required',
            'qlivree' => 'required',
            'date' => 'required|date',
            'id_annee' => 'required',
        ]);
        Demande::create($request->all());
        return redirect()->route('demandes.index')
                        ->with('success',"Demande enregistré avec succès.");
        // $data = new Demande([
        //     'id_agent' => $request->get('id_agent'),
        //     'id_article' => $request->get('id_article'),
        //     'qlivree' => $request->get('qlivree'),
        //     'date' => $request->get('date'),
        //     'id_annee'  => $request->get('id_annee')
        // ]);
        // $data->save();
        // return redirect()->route('demandes.index')
        //                 ->with('success',"L'article est enregistré avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        return view('demandes.show',compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        return view('demandes.edit',compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'qlivree' => 'required',
            'date' => 'required',
        ]);
        $demande->update($request->all());
    
        return redirect()->route('demandes.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('demandes.index')
                        ->with('success','suppression avec succès');
    }
}
