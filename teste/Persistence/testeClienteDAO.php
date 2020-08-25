<?php
    include_once '../../src/Model/cliente.php'; 
    include_once '../../src/Persistence/clienteDAO.php';


    class testeClienteDAO extends PHPUnit\Framework\TestCase{

        function __construct() {}

        function testeSalvar() {

            $obj = new Cliente(`João`, `78945612391`, `joao@gmail.com`, `78945611654`, `987`, `Acre`);
            $this->assertIsObject(obj);
            // $sql = "INSERT INTO `cliente`() VALUES ('" . $cliente->getNome()     . "','" . 
            //                                                                                                     $cliente->getCpf()      . "','" . 
            //                                                                                                     $cliente->getEmail()    . "','" . 
            //                                                                                                     $cliente->getTelefone() . "','" .
            //                                                                                                     $cliente->getSenha()    . "','" .
            //                                                                                                     $cliente->getEndereco() . "')";

            // if($connection->query($sql) === TRUE) {
            //     $connection->close();
            //     return true;
            // } else {
            //     echo "Erro ao inserir cliente: " . $connection->error;
            //     $connection->close();
            //     return false;
            // }

        }

        function testeRemover($cpf, $connection) {

            $sql = "DELETE FROM `cliente` WHERE `cliente`.`cpf` = '" . $cpf . "'";

            if($connection->query($sql) === TRUE) {
                $this->assertTrue($connection->query($sql));
            } else {
                $this->assertFalse($connection->query($sql));
            }

        }

        function testeConsultar($connection) {

            $sql = "SELECT * FROM `cliente`";
            $this->assertContainsOnlyInstancesOf(Cliente,$sql);

        }

        // function testeConsultarCPF($cpf, $connection) {
        //     $sql = "SELECT * FROM `cliente`";
        //     $res = $connection->query($sql);
        //     if (!empty($res) and $res->num_rows > 0) {
        //         while ($registro = $res->fetch_assoc()) {
        //             if ($registro['cpf'] == $cpf) {
        //                 $nome = $registro['nome'];
        //                 $cpf = $registro['cpf'];
        //                 $email = $registro['email'];
        //                 $telefone = $registro['telefone'];
        //                 $senha = $registro['senha'];
        //                 $endereco = $registro['endereco'];
        //                 $cliente = new Cliente($nome, $cpf, $email, $telefone, $senha, $endereco);
        //                 $connection->close();
        //                 return $cliente;
        //             }
        //         }
        //         $connection->close();
        //         return false; 
        //     } else {
        //         echo "Falha ao localizar cliente: " . $connection->error;
        //         $connection->close();
        //         return $connection->errno;
        //     }
        // }

        // function testeEditar($cliente, $connection) {

        //     $sql = "SELECT * FROM `cliente`";
        //     $res = $connection->query($sql);
        //     if (!empty($res) and $res->num_rows > 0) {
        //         while ($registro = $res->fetch_assoc()) {
        //             if ($registro['cpf'] == $cliente->getCpf())  {
        //                 $sql = "UPDATE `cliente` SET 
        //                                             `nome` = '" . $cliente->getNome() . "', 
        //                                             `email` = '" . $cliente->getEmail() . "', 
        //                                             `telefone` = '" . $cliente->getTelefone() . "', 
        //                                             `senha` = '" . $cliente->getSenha() . "', 
        //                                             `endereco` = '" . $cliente->getEndereco() ."' 
        //                                             WHERE `cliente`.`cpf` =" . $cliente->getCpf() ."";
        //                 if($connection->query($sql) === TRUE) {
        //                     $connection->close();
        //                     return true;
        //                 } else {
        //                     $connection->close();
        //                     return false;
        //                 }
        //             } 
        //         }
        //         $connection->close();
        //         return false;
        //     } else {
        //         echo "Falha ao realizar login: " . $connection->error;
        //         $connection->close();
        //         return $connection->errno;
        //     }

        }

    }
?>