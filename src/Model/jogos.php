<?php

    class Jogos extends Itens {

    private $plataforma;

    function __construct($id,
                         $nome,
                         $periodoLoc,
                         $valor,
                         $quant,
                         $plataforma) 
    {
        parent::__construct($id,
                            $nome,
                            $periodoLoc,
                            $valor,
                            $quant);
        $this->plataforma = $plataforma;
    }

    function getPlataforma() {
        return $this->plataforma;
    }


    }

?>