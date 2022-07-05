<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Annee;
use App\Models\Article;
use Dompdf\Dompdf;
use Auth;
use Dompdf\Options;

class PdfcmdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pdf(Request $request)
    {
        $annees = DB::table('annees')->get();
        if($request->id_annee)
        {   
            $commandes = Commande::where('id_annee',$request->id_annee )
                ->get();

            // instantiate and use options
            $options = new Options();
            $options->set('defaultFont', 'Helvetica');
            
            // instantiate and use the dompdf class
            $dompdf = new Dompdf($options);
            
            $dompdf->loadHtml(view('pdfcmd.pdf',compact('commandes')));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();
            // Output the generated PDF to Browser
            $dompdf->stream('pdfcmd.pdf', ['Attachment' => false]);
            exit();
        }
        return view('pdfcmd.recherche')
            ->with('annees',$annees);
    }    
}
