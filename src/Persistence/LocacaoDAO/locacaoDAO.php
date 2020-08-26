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

        function consultarId($id, $connection) {
            $sql = "SELECT * FROM `locacao`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['idLoc'] == $id)  {
                        $id = $registro['idLoc'];
                        $itemId = $registro['Itens_idItem'];
                        $idCliente = $registro['Cliente_idCliente'];
                        $idFuncionario = $registro['Funcionario_idFuncionario'];
                        $dataInicial = $registro['dataInicial'];
                        $dataFinal = $registro['dataFinal'];
                        $valorTotal = $registro['valorTotal'];
                        $locacao = new Locacao($dataInicial, $dataFinal, $valorTotal, $idFuncionario, $idCliente, $itemId); 
                        $locacao->setId($id);
                        $connection->close();
                        return $locacao;
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

        function remover($locacao, $connection) {

            $sql = "DELETE FROM `locacao` WHERE `locacao`.`idLoc` = '" . $locacao->getId() . "'";

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

            return $connection->query($sql);

        }

        function editar($locacao, $connection) {

            $sql = "SELECT * FROM `locacao`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['idLoc'] == $locacao->getId())  {
                        $sql = "UPDATE 
                                    `locacao` 
                                SET 
                                    `Itens_idItem` = '" . $locacao->getItem() . "', 
                                    `Cliente_idCliente` = '" . $locacao->getNomeCliente() . "', 
                                    `Funcionario_idFuncionario` = '" . $locacao->getNomeFuncionario() . "', 
                                    `dataInicial` = '" . $locacao->getDataInicial() . "', 
                                    `dataFinal` = '" . $locacao->getDataFinal() ."' ,
                                    `valorTotal` = '" . $locacao->getValorTotal() . "'
                                WHERE
                                    `locacao`.`idLoc` ='" . $locacao->getId() ."'";
                                    
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