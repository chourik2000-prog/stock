<?php

namespace App\Http\Controllers;
use App\Models\categorie;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::join('agents', 'agents.idcat', '=', 'categories', 'categories.id')
                  ->get(['agents.nom', 'agents.prenom', 'categories.libelle']);
        return view('agents.afficher',compact('agents'))->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categorie::all();
        return view('agents.create');
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
            'nom' => 'required',
            'prenom' => 'required',
            'idcat' => 'required',
           
        ]);
        Agent::create($request->all());
        return redirect()->route('agents.index')
                        ->with('success',"L'article est enregistré avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return view('agents.show',compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        return view('agents.edit',compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
        $agent->update($request->all());
    
        return redirect()->route('agents.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')
                        ->with('success','suppression avec succès');
    }
}
