<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Demande;
use App\Models\Article;
use App\Models\Agent;
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
     $articles = Article::all();
     $agents = Agent::all();
     $demandes = demande::all();
     return view('demandes.afficher',compact('demandes'))->with('articles', $articles)->with('agents', $agents);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Demande::all();
        return view('demandes.create')->with('cat', $cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Demande([
            'id_agent' => $request->get('id_agent'),
            'id_article' => $request->get('id_article'),
            'qlivree' => $request->get('qlivree'),
            'date' => $request->get('date')
        ]);
        $data->save();
        return redirect()->route('demandes.index')
                        ->with('success',"L'article est enregistré avec succès.");
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
