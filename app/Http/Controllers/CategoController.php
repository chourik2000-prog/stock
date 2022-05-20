<?php

namespace App\Http\Controllers;
use App\Models\Agent;
use App\Models\Catego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
                ->orderBy('libelle', 'asc')
                ->get();
        return view('categories.afficher',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'libelle' => 'required|max:255',
        ]);
        Catego::create($request->all());
        return redirect()->route('categos.index')
                        ->with('success','Catégorie enregistrée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catego  $catego
     * @return \Illuminate\Http\Response
     */
    public function show(Catego $catego)
    {
        return view('categories.voir',compact('catego'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catego  $catego
     * @return \Illuminate\Http\Response
     */
    public function edit(Catego $catego)
    {
        return view('categories.modifier',compact('catego'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catego  $catego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catego $catego)
    {
        $request->validate([
            'libelle' => 'required|max:255',
        ]);
        $catego->update($request->all());
    
        return redirect()->route('categos.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catego  $catego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catego $catego)
    {
        $catego->delete();
        return redirect()->route('categos.index')
                        ->with('success','suppression avec succès');
    }
}
