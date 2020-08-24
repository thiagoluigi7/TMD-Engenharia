<?php

    class funcionarioDAO {

        function __construct() {}
        
        function salvar($funcionario, $connection) {
            $sql = "INSERT INTO `funcionario`(`nome`, `cpf`, `salario`, `email`, `telefone`, `senha`, `endereco`, `Gerente_idGerente`) VALUES ('" . $funcionario->getNome()     . "','" . 
                                                                                                                                                $funcionario->getCpf()      . "','" . 
                                                                                                                                                $funcionario->getSalario()  . "','" .
                                                                                                                                                $funcionario->getEmail()    . "','" . 
                                                                                                                                                $funcionario->getTelefone() . "','" .
                                                                                                                                                $funcionario->getSenha()    . "','" .
                                                                                                                                                $funcionario->getEndereco() . "','" .
                                                                                                                                                "1')";

            

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

            $sql = "DELETE FROM `funcionario` WHERE `funcionario`.`cpf` = '" . $cpf . "'";

            if($connection->query($sql) === TRUE) {
                $connection->close();
                return true;
            } else {
                echo "Erro ao remover cliente: " . $connection->error;
                $connection->close();
                return false;
            }

        }

        function consultar($connection) {

            $sql = "SELECT * FROM `funcionario`";
            return $connection->query($sql);

        }


    }

?>