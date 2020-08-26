<?php

    class Cliente {

        private $nome;
        private $cpf;
        private $email;
        private $telefone;
        private $id;
        private $senha;
        private $endereco;

        function __construct(
            $nome,
            $cpf,
            $email,
            $telefone,
            $senha,
            $endereco
        ) {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->senha = $senha;
            $this->endereco = $endereco;
        }

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

        function setSenha($senha) {
            $this->senha = $senha;
        }

        function getEndereco() {
            return $this->endereco;
        }

        function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

        function __toString() {
            return "CPF: "      . $this->getCpf()      . "<br>" . 
                   "Nome: "     . $this->getNome()     . "<br>" .
                   "Email: "    . $this->getEmail()    . "<br>" .
                   "Telefone: " . $this->getTelefone() . "<br>" .
                   "Senha: "    . $this->getSenha()    . "<br>" .
                   "Endereço: " . $this->getEndereco() . "<br>";
                }

    }

?>