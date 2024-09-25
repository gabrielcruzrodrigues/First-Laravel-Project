<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    
    public function index(Request $request) 
    {
        $series = Serie::query()->orderBy('nome')->get();

        $successMessage = session('mensagem.sucesso');
        $request->session()->forget('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $successMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {   
        $serie = Serie::create($request->all());
        session(['mensagem.sucesso' => "A Série '$serie->nome' foi salva com sucesso!"]);
        return to_route('series.index');
    }

    public function destroy(Serie $series)
    {
        $series->delete();
        session(['mensagem.sucesso' => "A série '$series->nome' foi removida com sucesso!"]);

        return to_route('series.index');
    }
}
