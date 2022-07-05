<?php

namespace App\Http\Controllers;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Annee;
use App\Models\Demande;
use App\Models\Perte;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PdfapprovController extends Controller
{
    public function index(Request $request)
    {
        $annees = DB::table('annees')->get();
        if($request->id_annee)
        {   
            $approvisionnements = Approvisionnement::where('id_annee',$request->id_annee)
                ->get();

            // instantiate and use options
            $options = new Options();
            $options->set('defaultFont', 'Helvetica');

            // instantiate and use the dompdf class
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml(view('pdfappro.pdf',compact('approvisionnements')));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('pdfappro.pdf',['Attachment' =>false]);
            exit();
        }
        return view('pdfappro.recherche')
            ->with('annees',$annees);
    }   
}
