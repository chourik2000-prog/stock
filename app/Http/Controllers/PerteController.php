<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use App\Models\Article;
use App\Models\Perte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class PerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annees = Annee::all();
        $pertes = Perte::all();
        $articles = Article::all();
        return view('pertes.afficher',compact('articles'))
        ->with('pertes', $pertes)
        ->with('annees', $annees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anne = Annee::all();
        $cat = Perte::all();
        return view('pertes.create')
        ->with('cat', $cat)
        ->with('anne', $anne);
    }

    public function recherche(Request $request)
    {
        $user = Auth::user()->id_role;
        $annees = Annee::all();
        $articles = Article::all();

        if($request->id_annee) 
        {
           $pertes = Perte::where('id_annee', $request->id_annee)
                ->get();

            return view('pertes.afficher')
                ->with('pertes', $pertes)
                ->with('articles', $articles)
                ->with('annees', $annees)
                ->with('user',$user);

        }
        return view('pertes.recherche')
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
            'id_article' => 'required|exists:articles,id',
            'qperdue' => 'required|numeric|min:0',
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
            Perte::create($request->all());
                return redirect()->route('pertes.index')
                        ->with('success',"Perte enregistrée avec succès.");
        }
        else {
            flash("La date doit être comprise dans l'année académique")->error();

            return redirect()->route('pertes.index');
        }
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
            'id_article' => 'required|exists:articles,id',
            'qperdue' => 'required|numeric|min:0',
            'date' => 'required|date',
            'id_annee' => 'required|exists:annees,id',
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
