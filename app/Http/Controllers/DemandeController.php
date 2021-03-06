<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Demande;
use App\Models\Article;
use App\Models\Agent;
use App\Models\Annee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user()->role->name;
        $an  = $request->id_annee;
        $annees = Annee::all();
        $articles = Article::all();
        $agents = Agent::all();
        $demandes = Demande::all();
        return view('demandes.afficher',compact('demandes'))
            ->with('articles', $articles)
            ->with('agents', $agents)
            ->with('an', $an)
            ->with('annees', $annees)
            ->with('user',$user);
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

    public function recherche(Request $request)
    {
        $user = Auth::user()->role->name;
        $annees = Annee::all();

        $articles = Article::all();

        $agents = Agent::all();

        if($request->id_annee) 
        {
           $demandes = Demande::where('id_annee', $request->id_annee)
                ->get();

            return view('demandes.afficher')
                ->with('demandes', $demandes)
                ->with('articles', $articles)
                ->with('agents', $agents)
                ->with('annees', $annees)
                ->with('user',$user);
        }

        return view('demandes.recherche')
        ->with('annees',$annees);
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
                        ->with('success',"Demande enregistr??e avec succ??s.");
        }
        else 
        {
            flash("La date doit ??tre comprise dans l'ann??e acad??mique")->error();
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
                        ->with('success','Mise ?? jour avec succ??s');
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
                        ->with('success','suppression avec succ??s');
    }
}
