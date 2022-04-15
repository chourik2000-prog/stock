<?php
use App\Models\Annee;
use Carbon\Carbon;
 function index()
{
    // recupération de l'année active
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

    if($anneeActive == null)
    {
        flash("Aucune année n'est active")->error();
        return redirect()->route('annees.index');
    }

    // return view('deskapp/header',compact($anneeActive))
    // ->with('monthd', $monthd)
    // ->with('yeard',$yeard)
    // ->with('monthf',$monthf)
    // ->with('yearf',$yearf)
    // ->with('anneeActive',$anneeActive);
}