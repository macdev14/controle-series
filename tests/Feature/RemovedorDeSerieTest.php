<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemovedorDeSerieTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    private $serie;
    public function setUp(): void
    {
       parent::setUp();
       $criadorDeSerie = new CriadorDeSerie();
       $nome_serie = 'Nome da série';
       $numero_temp = 1;
       $ep_por_temp = 1;

       $formFields = [ 'nome' => $nome_serie, 'qtd_temporadas' => $numero_temp, 'ep_por_temporada' => $ep_por_temp  ];
       $this->serie = $criadorDeSerie->criarSerie($formFields);
    }

    public function testRemoverUmaSerie(): void
    {
        $this->assertDatabaseHas('series', ['id'=>$this->serie->id]);
        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome da série',  $this->serie->nome);
        $this->assertDatabaseMissing('series', ['id'=> $this->serie->id]);

    }
}
