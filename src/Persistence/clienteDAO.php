<?php

    class clienteDAO {

        function __construct() {}

        function salvar($cliente, $connection) {

            $sql = "INSERT INTO `cliente`(`nome`, `cpf`, `email`, `telefone`, `senha`, `endereco`) VALUES ('" . $cliente->getNome()     . "','" . 
                                                                                                                $cliente->getCpf()      . "','" . 
                                                                                                                $cliente->getEmail()    . "','" . 
                                                                                                                $cliente->getTelefone() . "','" .
                                                                                                                $cliente->getSenha()    . "','" .
                                                                                                                $cliente->getEndereco() . "')";
                                                                                                                
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