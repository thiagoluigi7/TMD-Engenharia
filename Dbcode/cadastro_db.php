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

            $sql_add_user = "INSERT INTO `users` (`nome`, `email`, `pass`) 
            VALUES ('%s', '%s', '%s');";

            $sql_add_user = sprintf($sql_add_user, $nome, $email, $senha);

            if($conn->query($sql_add_user) === TRUE) {
                echo "Usuário inserido com sucesso.";
            } else {
                echo "Erro ao inserir usuário: " . $sql_add_user->error;
            }


        } else {
            //Banco de dados já existe.

            $sql_add_user = "INSERT INTO `users` (`nome`, `email`, `pass`) 
            VALUES ('%s', '%s', '%s');";

            $sql_add_user = sprintf($sql_add_user, $nome, $email, $senha);


            if($conn->query($sql_add_user) === TRUE) {
                echo "Usuário inserido com sucesso.";
                $conn->close();
                return true;
            } else {
                echo "Erro ao inserir usuário: " . $conn->error;
                $conn->close();
                return $conn->errno;
            }
        }

    }


?>