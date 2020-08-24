<?php

    class clienteDAO {

        function __construct() {}

        function salvar($cliente, $connection) {
        
            $nome = $cliente->getNome();
            $cpf = $cliente->getCpf();
            $email = $cliente->getEmail();
            $telefone = $cliente->getTelefone();
            $senha = $cliente->getSenha();
            $endereco = $cliente->getEndereco();

            $sql = "INSERT INTO `cliente`(`nome`, `cpf`, `email`, `telefone`, `senha`, `endereco`) VALUES ('" . $nome     . "','" . 
                                                                                                                $cpf      . "','" . 
                                                                                                                $email    . "','" . 
                                                                                                                $telefone . "','" .
                                                                                                                $senha    . "','" .
                                                                                                                $endereco . "')";
            if($connection->query($sql) === TRUE) {
                $connection->close();
                return true;
            } else {
                echo "Erro ao inserir cliente: " . $connection->error;
                $connection->close();
                return false;
            }

        }

        function remover($cpf, $connection) {

            $sql = "DELETE FROM `cliente` WHERE `cliente`.`cpf` = '" . $cpf . "'";

            if($connection->query($sql) === TRUE) {
                $connection->close();
                return true;
            } else {
                echo "Erro ao remover cliente: " . $connection->error;
                $connection->close();
                return false;
            }

        }
    }

?>