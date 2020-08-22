<?php 

    function login_user($email, $senha) {
        
        $server = "localhost";
        $username = "Funcionario";
        $pass = "Funcionario!";
        $servername = "retrovibesgames";

        $conn = new mysqli ($server, $username, $pass, $servername);
        if ($conn->connect_error) {
            die("A conexão falhou: " . $conn->connect_error);
        }

        $sql_login_user = "SELECT * FROM clientes WHERE email='%s' AND pass ='%s'";
        $sql_login_user = sprintf ($sql_login_user, $email, $senha);

        if (mysqli_num_rows($conn->query($sql_login_user)) > 0) {
            echo "Login realizado com sucesso!";
            $conn->close();
            return true;
        } else {
            echo "Falha ao realizar login: " . $conn->error;
            $conn->close();
            return $conn->errno;
        }

    }


?>