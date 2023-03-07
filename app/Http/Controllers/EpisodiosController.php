<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
       
       return view('episodios.index', compact('temporada'));
    }
    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos)
        {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });

        $temporada->push();
        Session::flash("message", "Episódios marcados como assistidos!");
        return redirect()->back();
    }
}
