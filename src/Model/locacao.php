<?php

    class Locacao {

        private $idLoc;
        private $dataInicial;
        private $dataFinal;
        private $valorTotal;
        private $nomeFuncionario;
        private $nomeCliente;
        private $item;

        function __construct(
            $dataInicial,
            $dataFinal,
            $valorTotal,
            $nomeFuncionario,
            $nomeCliente,
            $item
        ) {

            $this->dataInicial = $dataInicial;
            $this->dataFinal = $dataFinal;
            $this->valorTotal = $valorTotal;
            $this->nomeFuncionario = $nomeFuncionario;
            $this->nomeCliente = $nomeCliente;
            $this->item = $item;

        }

        function getId() {
            return $this->idLoc;
        }

        function setId($idLoc) {
            $this->idLoc = $idLoc;
        }

        function getDataInicial() {
            return $this->dataInicial;
        }

        function getDataFinal() {
            return $this->dataFinal;
        }

        function getValorTotal() {
            return $this->valorTotal;
        }

        function getNomeFuncionario() {
            return $this->nomeFuncionario;
        }

        function getNomeCliente() {
            return $this->nomeCliente;
        }

        function getItem() {
            return $this->item;
        }

        function __toString() {
            return "ID: "                   . $this->getId()              . "<br>" . 
                   "Data Inicial: "         . $this->getDataInicial()     . "<br>" .
                   "Data Final: "           . $this->getDataFinal()       . "<br>" .
                   "Valor Total: "          . $this->getValorTotal()      . "<br>" .
                   "Nome do funcionário: "  . $this->getNomeFuncionario() . "<br>" .
                   "Nome do cliente: "      . $this->getNomeCliente()     . "<br>" . 
                   "Item: "                 . $this->getItem()            . "<br>";
                }

    }

?>