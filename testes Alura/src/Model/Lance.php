<?php

namespace Alura\Leilao\Model;

use Alura\Leilao\Model\Usuario;



class Lance
{
    /** @var Usuario */
    private $usuario;
    /** @var float */
    private $valor;

    public function __construct(Usuario $usuario, float $valor)
    {
        $this->usuario = $usuario;
        $this->valor = $valor;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }
    //aleatorio comentario somente outra_branch
    
   
}
