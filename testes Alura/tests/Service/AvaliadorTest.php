<?php

namespace Alura\Leilao\Tests\Service;

use PHPUnit\Framework\TestCase;
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

class AvaliadorTest extends TestCase
{
    public function testFindMaxValue()
    {
        //Given 
        $leilao = new Leilao('fiat 147 0km');
        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        //When 
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $vencedor =  $leiloeiro->getMaiorValor();

        //Then
        $this->assertEquals(2500,$vencedor) ;
    }

    public function testFindMinValue()
    {
        //Given 
        $leilao = new Leilao('fiat 147 0km');
        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        //When 
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $vencedor =  $leiloeiro->getMaiorValor();

        //Then
        $this->assertEquals(2500,$vencedor) ;
    }

    public function testOrderValue()
    {
        //Given 
        $leilao = new Leilao('fiat 147 0km');
        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

    
        
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        //When 
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $vencedor =  $leiloeiro->getMenorValor();

        //Then
        $this->assertEquals(2000,$vencedor) ;
    }

    public function testThreeBiggerValues(){

         //Given 
         $leilao = new Leilao('fiat 147 0km');
         $maria = new Usuario('Maria');
         $joao = new Usuario('Joao');
         $guilherme = new Usuario('Guilherme');
         $renato = new Usuario('Renato');



         $leilao->recebeLance(new Lance($joao, 2000));
         $leilao->recebeLance(new Lance($guilherme, 7000));
         $leilao->recebeLance(new Lance($maria, 3500));
         $leilao->recebeLance(new Lance($renato, 1500));

         $leiloeiro = new Avaliador();
         $leiloeiro->avalia($leilao);

         $maiores = $leiloeiro->getMaioresLances();

         $this->assertCount(3,$maiores);

         $valorLances = [7000,3500,2000];

        for ($i=0; $i < 3; $i++) { 
            $this->assertEquals($valorLances[$i],$maiores[$i]->getValor());
        }


 
 
    }
}
