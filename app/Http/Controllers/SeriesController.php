<?php

namespace App\Http\Controllers;
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
    // var_dump($series);
    // exit();
    // // $html = '<ul>';

    // // foreach($series as $serie ){
    // //     $html .= "<li>$serie</li>"; 
    // // }
    // // $html .= "</ul>";
    return view('series.index', compact('series'));
    }

    public function create()
    {

        return view('series.create');
    }

    public function store(Request $request)
    {
        
        $formFields= $request->validate([
            'nome'=>'required',
           
        ],[
            'nome.required'=>'Favor inserir nome',
        ]);

        Serie::create($formFields);
        return redirect()->route('series.listar');
    }

    public function update(Serie $serie)
    {
        $formFields= request()->validate([
            'nome'=>'required',
           
        ],[
            'nome.required'=>'Favor inserir nome',
        ]);

        $serie->update($formFields);
        Session::flash('message','Serie alterada com sucesso!');
        return back();
    }

    public function edit(Serie $serie){
        return view('series.editar', ['serie'=>$serie]);
    }
}
