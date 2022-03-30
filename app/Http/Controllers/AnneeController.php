<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annees = Annee::all();
        return view('annees.afficher',compact('annees'))->with('annees', $annees);
        dd('$annees');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annees.create');
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
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
            
        ]);
            
        $annees = new Annee; 
        $annees->libelle = $request->libelle;
        $annees->dateDebut = $request->dateDebut;
        $annees->dateFin = $request->dateFin;
        $annees->status = $request->input('status') ? true : false;
        
            $stat = $request->input('status');
                if($stat == true)
                    {
                        $annee = Annee::where('status', true)->first();
                            if($annee)
                                {
                                    $annee->status = !$annee->status;
                                    $annee->update();
                                    $annees->save();
                                        return redirect()->route('annees.index')
                                        ->with('success',"Année enregistré avec succès.");
                                }
                    }
        $annees->save();
            return redirect()->route('annees.index')
                ->with('success',"Année enregistré avec succès.");
        
    }

    public function date(Request $request , $id)
    {
        $annees = Annee::all();
            return  redirect()->route('datean');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function show(Annee $annee)
    {
        return view('annees.voir',compact('annee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function edit(Annee $annee)
    {
        return view('annees.modifier',
        compact('annee'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annee $annee)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut',
            
        ]);

        $annee->update($request->all());
    
        return redirect()->route('annees.index')
                        ->with('success','Mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annee $annee)
    {
        $annee->delete();
        return redirect()->route('annees.index')
                        ->with('success','suppression avec succès');
    }
}
