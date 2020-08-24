<?php

    class Locacao {

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

    }

?>