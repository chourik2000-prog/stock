<?php

namespace App\Http\Controllers;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Annee;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annees = Annee::all();   
        $accueils = Article::all();
        return view('accueils.accueil',compact('accueils'))->with('annees', $annees);

    }

    public function recherche(Request $request)
    {
        $annees = DB::table('annees')->get();
        $accueils = Article::all();

        if($request->id_annee) {
            $approvisionnements = Approvisionnement::where('id_annee', $request->id_annee)
                ->get();

            $demandes = Demande::where('id_annee', $request->id_annee)
                ->get();

            $pertes = Perte::where('id_annee', $request->id_annee)
                ->get();

            return view('accueils.accueil')
                ->with('approvisionnements', $approvisionnements)
                ->with('accueils', $accueils)
                ->with('demandes', $demandes)
                ->with('pertes', $pertes)
                ->with('annees', $annees);

        }
        return view('accueils.recherche')
        ->with('annees',$annees);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
