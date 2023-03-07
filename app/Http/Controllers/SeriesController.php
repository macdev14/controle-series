<?php

namespace App\Http\Controllers;
use App\Services\{CriadorDeSerie, RemovedorDeSerie};
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{



    //
    public function listarSeries(Request $request){

    $series = [
        'Grey\'s Anatomy',
        'Lost',
        'Agents of SHIELD'
    ];
    $series = Serie::all();
    
    return view('series.index', compact('series'));
    }

    public function create()
    {

        return view('series.create');
    }

    public function store(SeriesFormRequest $request, criadorDeSerie $criadorDeSerie)
    {
        
        $formFields = $request->validated();
        
        $serie = $criadorDeSerie->criarSerie($formFields);

        Session::flash('message',"Serie {$serie->id} e suas temporadas e episódio criados com sucesso!");
        return redirect()->route('series.listar');
    }

    public function update(Serie $serie, SeriesFormRequest $request)
    {
        $formFields= $request->validated();
         dd($formFields);

        var_dump($serie->update($formFields));
        Session::flash('message','Serie alterada com sucesso!');
        return redirect()->route('series.listar');
    }

    public function edit(Serie $serie){
        return view('series.editar', ['serie'=>$serie]);
    }


    public function delete(Serie $serie, RemovedorDeSerie $removedorDeSerie){
        
        //$serie->delete();
        $nomeSerie = $removedorDeSerie->removerSerie($serie);
        Session::flash('message', "Série {$nomeSerie} deletada com sucesso!");
        return redirect()->route('series.listar');
    }

    public function editaNome(Request $request, Serie $serie)
{
    $novoNome = $request->nome;
    // $serie = Serie::find($request->id);
    $serie->nome = $novoNome;
    $serie->save();
}
}
