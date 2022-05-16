<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function msg()
    {
        return view('msg.blade.php');
    }

    
}
