<?php

include_once '../Persistence/connection.php';

    class Gerente {

        private $id;
        private $nome;
        private $cpf;
        private $email;
        private $salario;
        private $telefone;
        private $senha;
        private $endereco;

        function __construct($nome, $cpf, $email, $salario, $telefone, $senha, $endereco) {

            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->salario = $salario;
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

        function getSalario() {
            return $this->salario;
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