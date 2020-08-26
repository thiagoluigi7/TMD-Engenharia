<?php

    include_once '../Model/cliente.php'; 
    include_once '../../Model/cliente.php';

    class clienteDAO {

        function __construct() {}

        function salvar($cliente, $connection) {

            $sql = "INSERT INTO `cliente`
                        (`nome`, `cpf`, `email`, `telefone`, `senha`, `endereco`) 
                    VALUES 
                        ('" . $cliente->getNome()     . "','" . 
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

        function consultar($connection) {

            $sql = "SELECT * FROM `cliente`";
            return $connection->query($sql);

        }

        function consultarCPF($cpf, $connection) {
            $sql = "SELECT * FROM `cliente`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['cpf'] == $cpf) {
                        $nome = $registro['nome'];
                        $cpf = $registro['cpf'];
                        $email = $registro['email'];
                        $telefone = $registro['telefone'];
                        $senha = $registro['senha'];
                        $endereco = $registro['endereco'];
                        $cliente = new Cliente($nome, $cpf, $email, $telefone, $senha, $endereco);
                        $connection->close();
                        return $cliente;
                    }
                }
                $connection->close();
                return false; 
            } else {
                echo "Falha ao localizar cliente: " . $connection->error;
                $connection->close();
                return $connection->errno;
            }
        }

        function editar($cliente, $connection) {

            $sql = "SELECT * FROM `cliente`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['cpf'] == $cliente->getCpf())  {
                        $sql = "UPDATE 
                                    `cliente` 
                                SET 
                                    `nome` = '" . $cliente->getNome() . "', 
                                    `email` = '" . $cliente->getEmail() . "', 
                                    `telefone` = '" . $cliente->getTelefone() . "', 
                                    `senha` = '" . $cliente->getSenha() . "', 
                                    `endereco` = '" . $cliente->getEndereco() ."' 
                                WHERE
                                    `cliente`.`cpf` =" . $cliente->getCpf() ."";
                        if($connection->query($sql) === TRUE) {
                            $connection->close();
                            return true;
                        } else {
                            $connection->close();
                            return false;
                        }
                    } 
                }
                $connection->close();
                return false;
            } else {
                echo "Falha ao realizar edição: " . $connection->error;
                $connection->close();
                return $connection->errno;
            }

        }
    }

?>