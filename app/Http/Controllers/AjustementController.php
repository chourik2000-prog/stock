<?php

namespace App\Http\Controllers;

use App\Models\Ajustement;
use Illuminate\Http\Request;

class AjustementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajustements = ajustement::latest()->paginate(5);
        return view('ajustements.afficher',compact('ajustements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajustements.create');
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
            'quantite' => 'required',
            'motif' => 'required',
        ]);
        Ajustement::create($request->all());
        return redirect()->route('ajustements.index')
                        ->with('success',"L'article est enregistré avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ajustement  $ajustement
     * @return \Illuminate\Http\Response
     */
    public function show(Ajustement $ajustement)
    {
        return view('ajustements.show',compact('ajustement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ajustement  $ajustement
     * @return \Illuminate\Http\Response
     */
    public function edit(Ajustement $ajustement)
    {
        return view('ajustements.edit',compact('ajustement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ajustement  $ajustement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ajustement $ajustement)
    {
        $request->validate([
            'quantite' => 'required',
            'motif' => 'required',
        ]);
        $ajustement->update($request->all());
    
        return redirect()->route('ajustements.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ajustement  $ajustement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ajustement $ajustement)
    {
        $ajustement->delete();
        return redirect()->route('ajustements.index')
                        ->with('success','suppression avec succès');
    }
}
