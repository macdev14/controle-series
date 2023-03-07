<?php

namespace App\Services;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;
class CriadorDeSerie
{
    public function criarSerie($formFields)
    {
       
        DB::beginTransaction();
        $serie = Serie::create(['nome'=> $formFields["nome"] ]);
        $qtd_temp = intval($formFields["qtd_temporadas"]);
        $ep_por_temporada = intval($formFields["ep_por_temporada"]);
        $this->criarTemporadas($serie, $qtd_temp, $ep_por_temporada);
        DB::commit();
      
        
        return $serie;
    }

    private function criarTemporadas(Serie $serie, int $qtd_temp, int $ep_por_temporada){
        for($i=1; $i<=$qtd_temp; $i++){
            $temporada = $serie->temporadas()->create(['numero'=>$i]);
            $this->criarEpisodios($temporada, $ep_por_temporada);
            
        }
    }

    private function criarEpisodios( Temporada $temporada, int $ep_por_temporada){
            for ($j=1; $j<=$ep_por_temporada; $j++){
                            $episodio = $temporada->episodios()->create(['numero'=>$j]);
                }
    }
}