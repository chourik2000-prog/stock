<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Perte;
use Illuminate\Http\Request;

class PerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertes = Perte::all();
        $articles = Article::latest()->get();
        return view('pertes.afficher',compact('articles'))->with('pertes', $pertes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Perte::all();
        return view('pertes.create')->with('cat', $cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Perte([
            'id_article' => $request->get('id_article'),
            'qperdue' => $request->get('qperdue'),
            'date' => $request->get('date')
        ]);
        $data->save();
        return redirect()->route('pertes.index')
                        ->with('success',"L'article est enregistré avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function show(Perte $perte)
    {
        return view('pertes.show',compact('perte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function edit(Perte $perte)
    {
        return view('pertes.edit',compact('perte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perte $perte)
    {
        $request->validate([
            'qperdue' => 'required',
            'date' => 'required',
        ]);
        $perte->update($request->all());

        return redirect()->route('pertes.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perte $perte)
    {
        $perte->delete();
        return redirect()->route('pertes.index')
                        ->with('success','suppression avec succès');
    }
}
