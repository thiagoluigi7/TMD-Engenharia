<?php

    include_once '../../Model/item.php';
    class itemDAO {

        function __construct() {}
        
        function salvar($item, $connection) {
            $sql = "INSERT INTO `itens`
                        (`nome`, `periodoLoc`, `valor`, `quant`) 
                    VALUES 
                    ('" .   $item->getNome()        . "', " . 
                            $item->getPeriodoLoc()  . ", " . 
                            $item->getValor()       . ", " .
                            $item->getQuant()       . ")";

            if($connection->query($sql) === TRUE) {
                $connection->close();
                return true;
            } else {
                echo "Erro ao inserir item: " . $connection->error;
                $connection->close();
                return false;
            }
        }

        function remover($id, $connection) {

            $sql = "DELETE FROM 
                        `itens` 
                    WHERE 
                        `itens`.`idItem` = '" . $id . "'";

            if($connection->query($sql) === TRUE) {
                $connection->close();
                return true;
            } else {
                echo "Erro ao remover item: " . $connection->error;
                $connection->close();
                return false;
            }

        }

        function consultar($connection) {

            $sql = "SELECT * FROM `itens`";
            return $connection->query($sql);

        }

        function consultarId($id, $connection) {
            $sql = "SELECT * FROM `itens`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['idItem'] == $id) {
                        $id = $registro['idItem'];
                        $nome = $registro['nome'];
                        $periodoLoc = $registro['periodoLoc'];
                        $valor = $registro['valor'];
                        $quant = $registro['quant'];
                        $item = new Item($nome, $periodoLoc, $valor, $quant);
                        $item->setId($id);
                        $connection->close();
                        return $item;
                    }
                }
                $connection->close();
                return false; 
            } else {
                echo "Falha ao localizar item: " . $connection->error;
                $connection->close();
                return $connection->errno;
            }
        }

        function editar($item, $connection) {

            $sql = "SELECT * FROM `itens`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['idItem'] == $item->getId())  {
                        $sql = "UPDATE 
                                    `itens` 
                                SET 
                                    `nome` = '"        . $item->getNome() . "',
                                    `periodoLoc` = "  . $item->getPeriodoLoc() . ",
                                    `valor` = "       . $item->getValor() . ", 
                                    `quant` = "       . $item->getQuant() . "
                                WHERE
                                    `itens`.`idItem` =" . $item->getId();
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