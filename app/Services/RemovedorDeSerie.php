<?php
namespace App\Services;

use App\Models\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;
class RemovedorDeSerie{
    public function removerSerie(Serie $serie){
        DB::beginTransaction();
       
                $nomeSerie = $serie->nome;
                $this->removerTemporadas($serie);         
                $serie->delete();
        DB::commit();
        
        return $nomeSerie;
    }


    private function removerTemporadas($serie){
            $serie->temporadas()->each(
                    function (Temporada $temporada){
                        $this->removerEpisodios($temporada);
                        $temporada->delete();
            }
        );
                              
    }

    private function removerEpisodios($temporada){
        $temporada->episodios->each(
                            function (Episodio $episodio){
                                    $episodio->delete();
                           }
                    );

        
    }
}