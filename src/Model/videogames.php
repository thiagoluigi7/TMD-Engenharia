<?php

    class Videogames extends Itens {

    private $tipo;

    function __construct($id,
                         $nome,
                         $periodoLoc,
                         $valor,
                         $quant,
                         $tipo) 
    {
        parent::__construct($id,
                            $nome,
                            $periodoLoc,
                            $valor,
                            $quant);
        $this->tipo = $tipo;
    }

    function getTipo() {
        return $this->tipo;
    }


    }

?>