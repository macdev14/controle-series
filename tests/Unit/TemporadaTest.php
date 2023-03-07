<?php

namespace Tests\Unit;

use App\Models\Episodio;
use App\Models\Temporada;
use Tests\TestCase;

class TemporadaTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    private $temporada;


    public function setUp() : void{
            parent::setUp();
            $temporada = new Temporada();
            $episodio1 = new Episodio();
            $episodio1->assistido = true;
            $episodio2 = new Episodio();
            $episodio2->assistido = false;
            $episodio3 = new Episodio();
            $episodio3->assistido=true;
            $temporada->episodios->add($episodio1);
            $temporada->episodios->add($episodio2);
            $temporada->episodios->add($episodio3);
            $this->temporada = $temporada;
    }


    public function testaBuscaPorEpisodiosAssistidos(){
        
        $episodiosAssistidos = $this->temporada->getEpisodiosAssistidos();
        

        $episodiosAssistidos->each(function($episodio){
            $this->assertTrue($episodio->assistido); 
        });
    }

    public function testBuscaTodosOsEpisodios(){
        $episodios = $this->temporada->episodios;
        $this->assertCount(3,$episodios);    
    }
}
