<?php

    class Itens {
        
    private $id;
    private $nome;
    private $periodoLoc;
    private $valor;
    private $quant;

    function __construct(
        $id,
        $nome,
        $periodoLoc,
        $valor,
        $quant
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->periodoLoc = $periodoLoc;
        $this->valor = $valor;
        $this->quant = $quant;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPeriodoLoc() {
        return $this->periodoLoc;
    }

    function getValor() {
        return $this->valor;
    }

    function getQuant() {
        return $this->quant;
    }

    }

?>