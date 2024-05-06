<?php

//Arrange act Assert 
//Given when Then

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

//Given 
$leilao = new Leilao('fiat 147 0km');
$maria = new Usuario('Maria');
$joao = new Usuario('Joao');


$leilao->recebeLance(new Lance($joao,2000));
$leilao->recebeLance(new Lance($maria,2500));

//When 
$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

$vencedor =  $leiloeiro->getMaiorValor();

//Then
echo $vencedor == 2500 ? 'Testes ok' : 'Erro nos testes';
