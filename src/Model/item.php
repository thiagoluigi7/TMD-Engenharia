<?php

    class Item {
        
    private $id;
    private $nome;
    private $periodoLoc;
    private $valor;
    private $quant;

    function __construct(
        $nome,
        $periodoLoc,
        $valor,
        $quant
    ) {
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

    function setId($id) {
        $this->id = $id;
    }

    function __toString() {
        return "ID: "                    . $this->getId()      . "<br>" . 
               "Nome: "                  . $this->getNome()     . "<br>" .
               "Periodo de locação: "    . $this->getPeriodoLoc()    . "<br>" .
               "Valor: "                 . $this->getValor() . "<br>" .
               "Quantidade: "            . $this->getQuant()    . "<br>";
            }

    }

?>