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
use App\Models\Approvisionnement;
use App\Models\Demande;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BilanChart $chart)
    {
        return view('bilans.bilan', ['chart' => $chart->build()]);
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
    public function store(Request $request, LarapexChart $chart) 
    {
       if($request->id_article) {

            $qEntrant = DB::table('approvisionnements')
                ->where('id_article', $request->id_article)
                ->sum('qentrant');

            $qLivree = DB::table('demandes')
                ->where('id_article',$request->id_article)
                ->sum('qlivree');

            $perte = DB::table('pertes')
            ->where('id_article',$request->id_article)
            ->sum('qperdue');

            $restant = $qEntrant - $qLivree - $perte;

            
            $plivree = round((($qLivree/$qEntrant)*100), 2);
            $pperte = round((($perte/$qEntrant)*100), 2);
            $prestant =round((($restant/$qEntrant)*100), 2);

        
            //dd($plivree,$pperte,$prestant);

            $bilanChart = $chart->pieChart()
                ->setTitle('Statistiques')
                ->setSubtitle('Saison 2021.')
                ->addData([$plivree, $pperte,$prestant])
                ->setLabels(['Quantité livrée','Qunatité perdue', 'Quantité restante']);


             return view('bilans.bilan', ['chart' => $bilanChart]);
       }





     return redirect()->route('bilans.bilan');
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
