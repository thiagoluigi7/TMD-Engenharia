<?php

    function add_user ($nome, $email, $senha) {

        $server = "localhost";
        $username = "Funcionario";
        $pass = "Funcionario!";
        $servername = "retrovibesgames";

        $conn = new mysqli($server, $username, $pass, $servername);
        if ($conn->connect_error) {
            die("A conexão falhou: " . $conn->connect_error);
        }

        $sql = "CREATE DATABASE retrovibesgames";
        if ($conn->query($sql)=== TRUE) {
            echo "Banco de dados criado com sucesso.";
            //Adiciona a tabela clientes caso ela não exista
            $sql_create_client_table = "CREATE TABLE IF NOT EXISTS `retrovibesgames`.`clientes` ( `nome` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `pass` VARCHAR(255) NOT NULL , PRIMARY KEY (`email`)) ENGINE = InnoDB;";
            if ($conn->query($sql_create_client_table)){
                $sql_add_user = "INSERT INTO `clientes` (`nome`, `email`, `pass`) 
                VALUES ('%s', '%s', '%s');";
    
                $sql_add_user = sprintf($sql_add_user, $nome, $email, $senha);
    
                if($conn->query($sql_add_user) === TRUE) {
                    echo "Cliente inserido com sucesso.";
                } else {
                    echo "Erro ao inserir cliente: " . $sql_add_user->error;
                }
            } else {
                echo "Erro ao criar tabela de clientes: " . $sql_create_client_table->error;
            }
            //$sql_add_user = "INSERT INTO `clientes` (`nome`, `email`, `pass`) 
            //VALUES ('%s', '%s', '%s');";

            //$sql_add_user = sprintf($sql_add_user, $nome, $email, $senha);

            //if($conn->query($sql_add_user) === TRUE) {
            //    echo "Cliente inserido com sucesso.";
            //} else {
            //    echo "Erro ao inserir cliente: " . $sql_add_user->error;
            //}


        } else {
            //Banco de dados já existe.
            //Adiciona a tabela clientes caso ela não exista
            $sql_create_client_table = "CREATE TABLE IF NOT EXISTS `retrovibesgames`.`clientes` ( `nome` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `pass` VARCHAR(255) NOT NULL , PRIMARY KEY (`email`)) ENGINE = InnoDB;";
            if ($conn->query($sql_create_client_table)){
                $sql_add_user = "INSERT INTO `clientes` (`nome`, `email`, `pass`) 
                VALUES ('%s', '%s', '%s');";

                $sql_add_user = sprintf($sql_add_user, $nome, $email, $senha);


                if($conn->query($sql_add_user) === TRUE) {
                    echo "Cliente inserido com sucesso.";
                    $conn->close();
                    return true;
                } else {
                    echo "Erro ao inserir cliente: " . $conn->error;
                    $conn->close();
                    return $conn->errno;
                }
            } else {
                echo "Erro ao criar tabela de clientes: " . $sql_create_client_table->error;
            }
        }
    }

?>