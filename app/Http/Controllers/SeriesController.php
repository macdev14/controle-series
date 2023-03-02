<?php

namespace App\Http\Controllers;

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

    public function store(SeriesFormRequest $request)
    {
        
        $formFields = $request->validated();
        $serie = Serie::create(['nome'=> $formFields["nome"] ]);
        $qtd_temp = intval($formFields["qtd_temporadas"]);
        $ep_por_temporada = intval($formFields["ep_por_temporada"]);
        // return var_dump($formFields["qtd_temporadas"]);
        for($i=1; $i<=$qtd_temp; $i++){
            $temporada = $serie->temporadas()->create(['numero'=>$i]);
                for ($j=1; $j<=$ep_por_temporada; $j++){
                   $episodio = $temporada->episodios()->create(['numero'=>$j]);
                }
                
            
        }

        Session::flash('message',"Serie {$serie->id} e suas temporadas e episódio criados com sucesso!");
        return redirect()->route('series.listar');
    }

    public function update(Serie $serie, SeriesFormRequest $request)
    {
        $formFields= $request->validated();
         

        $serie->update($formFields);
        Session::flash('message','Serie alterada com sucesso!');
        return redirect()->route('series.listar');
    }

    public function edit(Serie $serie){
        return view('series.editar', ['serie'=>$serie]);
    }


    public function delete(Serie $serie){
        $serie->delete();
        Session::flash('message','Serie deletada com sucesso!');
        return redirect()->route('series.listar');
    }
}
