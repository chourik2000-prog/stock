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

class PdfdemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdf(Request $request)
    {
        $annees = Annee::all();

        if($request->id_annee) 
        {

            $demandes = Demande::where('id_annee',$request->id_annee)
                ->get();

            // instantiate and use options
            $options = new Options();
            $options->set('defaultFont', 'Helvetica');

            // instantiate and use the dompdf class
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml(view('pdfdem.pdf',compact('demandes')));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('pdfdem.pdf', ['Attachment' => false]);
            exit();
        }

        return view('pdfdem.recherche')
            ->with('annees',$annees);
    }
}
