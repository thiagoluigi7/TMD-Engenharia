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

        function autenticar($cpf, $senha) {
            $connection = new Connection();
            $connection->getConnection();
            $sql = "SELECT * FROM 'gerente'";
            $res = $connection->query($sql);
            if ($res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if (($registro['cpf'] == $cpf) and ($registro['senha'] == $senha))  {
                        return true;
                    } else {
                        return false;
                    }

                }
            }
        }

        function inserirFuncionario($nome, $cpf, $email, $salario, $telefone, $senha, $endereco) {

        }

        function verFuncionarios() {

        }

        function atualizarFuncionario($idFunc) {

        }

        function deletarFuncionario($idFunc) {

        }

        function  inserirCliente() {

        }

        function verClientes() {

        }

        function atualizarCliente($idCliente) {

        }

        function deletarCliente($idCliente) {

        }

    }

?>