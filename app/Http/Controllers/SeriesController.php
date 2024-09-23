<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    
    public function index() 
    {
        $series = ['Serie 1', 'Serie 2', 'Serie 3'];
        return view('ListarSeries')->with('series', $series);
    }
}
