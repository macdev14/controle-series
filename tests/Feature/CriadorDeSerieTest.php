<?php

namespace Tests\Feature;

use App\Models\Serie;
use App\Services\CriadorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CriadorDeSerieTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;
   public function testCriarSerie(){
    $criadorDeSerie = new CriadorDeSerie();
    $nome_serie = 'Teste';
    $numero_temp = 1;
    $ep_por_temp = 1;
    $formFields = [ 'nome' => $nome_serie, 'qtd_temporadas' => $numero_temp, 'ep_por_temporada' => $ep_por_temp  ];
    $serieCriada = $criadorDeSerie->criarSerie($formFields);
    $this->assertInstanceOf(Serie::class, $serieCriada);

    $this->assertDatabaseHas('series', ['nome'=> $nome_serie]);
    $this->assertDatabaseHas('temporadas', ['serie_id'=> $serieCriada->id,  'numero'=>1]);
    $this->assertDatabaseHas('episodios', ['numero'=> 1]);
   }
}
