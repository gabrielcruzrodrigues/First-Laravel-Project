<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    
    public function index(Request $request) 
    {
        $series = Series::all();

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

    public function store(SeriesFormRequest $request)
    {           
        $serie = Series::create($request->all());

        for ($i = 1; $i < $request->seasonQty; $i++)
        {
            $season = $serie->seasons()->create([
                'number' => $i
            ]);

            for ($j = 1; $j < $request->episodesPerSeason; $j++)
            {
                $season->episode()->create([
                    'number' => $j
                ]);
            }
        }

        return to_route('series.index')
            ->with('mensagem.sucesso', "A Série '$serie->nome' foi salva com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "A série '$series->nome' foi removida com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')
            ->with('series', $series);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "A série '$series->nome' foi atualizada!");
    }
}
