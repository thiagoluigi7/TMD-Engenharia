<?php

    class Cliente {

        private $nome;
        private $cpf;
        private $email;
        private $telefone;
        private $id;
        private $senha;
        private $endereco;

        function getNome() {
            return $this->nome;
        }

        function getCpf() {
            return $this->cpf;
        }

        function getEmail() {
            return $this->email;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function getSenha() {
            return $this->senha;
        }

        function getEndereco() {
            return $this->endereco;
        }

    }

?>