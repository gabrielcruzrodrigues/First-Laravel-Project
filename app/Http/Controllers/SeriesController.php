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
        $request->validate(['nome' => 'required|string|min:3']);
        
        $serie = Serie::create($request->all());

        return to_route('series.index')
            ->with('mensagem.sucesso', "A Série '$serie->nome' foi salva com sucesso!");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "A série '$series->nome' foi removida com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')
            ->with('series', $series);
    }

    public function update(Request $request, Serie $series)
    {
        $request->validate(['nome' => 'required|string|max:255']);

        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "A série '$series->nome' foi atualizada!");
    }
}
