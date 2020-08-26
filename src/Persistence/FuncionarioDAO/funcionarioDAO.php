<?php

    include_once '../../Model/funcionario.php';
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

        function consultarCPF($cpf, $connection) {
            $sql = "SELECT * FROM `funcionario`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['cpf'] == $cpf) {
                        $nome = $registro['nome'];
                        $cpf = $registro['cpf'];
                        $salario = $registro['salario'];
                        $email = $registro['email'];
                        $telefone = $registro['telefone'];
                        $senha = $registro['senha'];
                        $endereco = $registro['endereco'];
                        $funcionario = new Funcionario($nome, $cpf, $email, $salario, $telefone, $senha, $endereco);
                        $connection->close();
                        return $funcionario;
                    }
                }
                $connection->close();
                return false; 
            } else {
                echo "Falha ao localizar funcionário: " . $connection->error;
                $connection->close();
                return $connection->errno;
            }
        }

        function editar($funcionario, $connection) {

            $sql = "SELECT * FROM `funcionario`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['cpf'] == $funcionario->getCpf())  {
                        $sql = "UPDATE 
                                    `funcionario` 
                                SET 
                                    `nome` = '"     . $funcionario->getNome() . "',
                                    `salario` = '"  . $funcionario->getSalario() . "',
                                    `email` = '"    . $funcionario->getEmail() . "', 
                                    `telefone` = '" . $funcionario->getTelefone() . "', 
                                    `senha` = '"    . $funcionario->getSenha() . "', 
                                    `endereco` = '" . $funcionario->getEndereco() ."' 
                                WHERE
                                    `funcionario`.`cpf` =" . $funcionario->getCpf() ."";
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