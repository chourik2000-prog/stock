<?php

namespace App\Http\Controllers;

use App\Charts\BilanChart;
use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ApprovisionnementController;
use App\Http\Controllers\PerteController;
use App\Http\Controllers\DemandeController;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Perte;
use App\Models\Annee;
use App\Models\Approvisionnement;
use App\Models\Demande;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BilanChart $chart)
    {
        $annees = Annee::all();
        $bilans = DB::table('articles')
            ->select('articles.*')
            ->get();
            return view('bilans.bilan', compact('bilans'), ['chart' => $chart->build()])->with('annees', $annees);
    } 

    /**
     * @return \Illuminate\Http\Response
     */
    public function recherche(Request $request)
    {
        $annees = Annee::all();
        $bilans = DB::table('articles')->get();

        if($request->input('id_article') != null) {
           return  redirect()->route('bilanChart', [
            'id_article' => $request->input('id_article')
           ]);
        }

        return view('bilans.recherche', [
            "bilans" => $bilans
        ])->with('annees', $annees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LarapexChart $chart) 
    {
        $annees = Annee::all();
       if($request->id_article) {

            $qEntrant = Approvisionnement::
            where('id_article', $request->id_article)
            ->sum('qentrant');

            $qLivree = Demande::
            where('id_article',$request->id_article)
            ->sum('qlivree');

            $perte = Perte::
            where('id_article',$request->id_article)
            ->sum('qperdue');

            $restant = $qEntrant - $qLivree - $perte;
            
            $plivree = $qEntrant == 0? 0 : round((($qLivree/$qEntrant)*100), 2);
            $pperte = $qEntrant  == 0? 0 : round((($perte/$qEntrant)*100),  2);
            $prestant =$qEntrant == 0? 0 : round((($restant/$qEntrant)*100), 2);

            $bilanChart = $chart->pieChart()
            ->setTitle('Statistiques')
            ->setSubtitle('Saison 2021.')
            ->addData([$plivree, $pperte,$prestant])
            ->setLabels(['Quantité livrée','Qunatité perdue', 'Quantité restante']);

            return view('bilans.bilan', [
                'chart' => $bilanChart,
                'qEntrant' => $qEntrant
            ])->with('annees', $annees);
       }

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
