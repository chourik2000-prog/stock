<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Demande;
use App\Models\Article;
use App\Models\Agent;
use App\Models\Annee;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        $demandes = Demande::all();
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
        $demandes = Demande::all();
        $agents = Agent::all();
        $articles = Article::all();
        return view('demandes.create')
            ->with('annees', $annees)
            ->with('demandes', $demandes)
            ->with('agents','$agents')
            ->with('articles', $articles);
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
            'id_agent' => 'required|exists:agents,id',
            'id_article' => 'required|exists:articles,id',
            'qlivree' => 'required|numeric|min:0',
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
            Demande::create($request->all());
                return redirect()->route('demandes.index')
                        ->with('success',"Demande enregistré avec succès.");
        }
        else 
        {
            flash("La date doit être comprise dans l'année académique")->error();
                return redirect()->route('approvisionnements.index');
        }


       
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
            'id_agent' => 'required|exists:agents,id',
            'id_article' => 'required|exists:articles,id',
            'qlivree' => 'required|numeric|min:0',
            'date' => 'required|date',
            'id_annee' => 'required|exists:annees,id',
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
