<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annees = Annee::all();
        return view('annees',compact('annees'))->with('annees', $annees);
    }

   
}
