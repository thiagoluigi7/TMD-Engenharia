<?php

    include_once '../../Model/locacao.php'; 

    class locacaoDAO {

        function __construct() {}

        function salvar($locacao, $connection) {

            $sql = "INSERT INTO `locacao`(`idLoc`, `Itens_idItem`, `Cliente_idCliente`, `Funcionario_idFuncionario`, `dataInicial`, `dataFinal`, `valorTotal`) VALUES (NULL, '" . 
                                                                                                                                                                   $locacao->getItem()       . "', '" . 
                                                                                                                                                                   $locacao->getNomeCliente()         . "', '" . 
                                                                                                                                                                   $locacao->getNomeFuncionario()        . "', '" . 
                                                                                                                                                                   $locacao->getDataInicial()   . "', '" .
                                                                                                                                                                   $locacao->getDataFinal()       . "', '" .
                                                                                                                                                                   $locacao->getValorTotal()              . "')";


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

            $sql = "SELECT C.nome AS nomeCliente, C.email AS emailCliente, F.nome AS nomeFuncionario, L.dataIniciaL AS dataInicial, L.dataFinaL AS dataFinal, L.valorTotal AS valorTotal
                        FROM locacao AS L
                            JOIN cliente AS C ON L.Cliente_idCliente = C.idCliente
                            JOIN funcionario AS F on L.Funcionario_idFuncionario = F.idFuncionario";
                        // WHERE L.

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
                        $sql = "UPDATE `cliente` SET 
                                                    `nome` = '" . $cliente->getNome() . "', 
                                                    `email` = '" . $cliente->getEmail() . "', 
                                                    `telefone` = '" . $cliente->getTelefone() . "', 
                                                    `senha` = '" . $cliente->getSenha() . "', 
                                                    `endereco` = '" . $cliente->getEndereco() ."' 
                                                    WHERE `cliente`.`cpf` =" . $cliente->getCpf() ."";
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
                echo "Falha ao realizar login: " . $connection->error;
                $connection->close();
                return $connection->errno;
            }

        }
    }

?>