<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use Carbon\Carbon;

class TerminerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anneeActive = Annee::where('status', 1);
        // format mois annee
        $dateDebut = Annee::where('status', 1)
        ->value('dateDebut');

        $dateFin = Annee::where('status', 1)
        ->value('dateFin');
        
        $monthd = Carbon::createFromFormat('Y-m-d',$dateDebut)->locale('fr_FR')
        ->isoformat('MMMM');
        $yeard = Carbon::createFromFormat('Y-m-d',$dateDebut)->year;

        $monthf = Carbon::createFromFormat('Y-m-d',$dateFin)->locale('fr_FR')
        ->isoformat('MMMM');
        $yearf = Carbon::createFromFormat('Y-m-d',$dateFin)->year;

        if($anneeActive == null){
            flash("Aucune année n'est active")->error();
            return redirect()->route('annees.index');
        }

        return view('deskapp/header')
        ->with('monthd', $monthd)
        ->with('yeard',$yeard)
        ->with('monthf',$monthf)
        ->with('yearf',$yearf);
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
        //
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
