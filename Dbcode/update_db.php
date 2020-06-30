<?php

    function update_user($nome, $senha, $tipo, $usuario) {
        
        $server = "localhost";
        $username = "Funcionario";
        $pass = "Funcionario";
        $servername = "retrovibesgames";

        $conn = new mysqli ($server, $username, $pass, $servername);
        if ($conn->connect_error) {
            die("A conexão falhou: " . $conn->connect_error);
        }

        //Atualizar nome e senha
        if ($tipo == 0) {
            $sql_edit_user_name = "UPDATE retrovibesgames SET nome=%s WHERE email=%s";
            $sql_edit_user_name = sprintf($sql_edit_user_name, $nome, $usuario);
            $sql_edit_user_pass = "UPDATE retrovibesgames SET pass=%s WHERE email=%s";
            $sql_edit_user_pass = sprintf($sql_edit_user_pass, $senha, $usuario);
            
            //Salva as informações antigas para caso o update dê errado
            $sql_bkp_user = "SELECT * FROM clientes WHERE email='%s'";
            $sql_bkp_user = sprintf($sql_bkp_user, $usuario);
            $old_data = ($conn->query($sql_bkp_user));
            if ($old_data->num_rows > 0) {
                $row = $result->fetch_assoc();
                $old_name = $row["nome"];
                $old_pass = $row["pass"];
                $sql_restore_name = "UPDATE retrovibesgames SET nome=%s WHERE email=%s";
                $sql_restore_name = sprintf($sql_restore_name, $old_name, $usuario);
                $sql_restore_pass = "UPDATE retrovibesgames SET pass=%s WHERE email=%s";
                $sql_restore_pass = sprintf($sql_restore_pass, $old_pass, $usuario);
            } else {
                echo "Usuário inválido: " . $conn->error;
            }

            if($conn->query($sql_edit_user_name) == true) {
                if($conn->query($sql_edit_user_pass) == true) {
                    echo "O nome e a senha foram alterados com sucesso.";
                    $conn->close();
                    return true;
                } else {
                    echo "Falha ao alterar a senha: " . $conn->error;
                    $conn->query($sql_restore_name);
                    $conn->query($sql_restore_pass);
                    $conn->close();
                    return $conn->errno;
                }
            } else {
                echo "Falha ao alterar o nome: " . $conn->error;
                $conn->query($sql_restore_name);
                $conn->query($sql_restore_pass);
                $conn->close();
                return $conn->errno;
            }
        }
        
        //Atualizar nome
        if ($tipo == 1) {
            $sql_edit_user_name = "UPDATE retrovibesgames SET nome=%s WHERE email=%s";
            $sql_edit_user_name = sprintf($sql_edit_user_name, $nome, $usuario);

            //Salva as informações antigas para caso o update dê errado
            $sql_bkp_user = "SELECT * FROM clientes WHERE email='%s'";
            $sql_bkp_user = sprintf($sql_bkp_user, $usuario);
            $old_data = ($conn->query($sql_bkp_user));
            if ($old_data->num_rows > 0) {
                $row = $result->fetch_assoc();
                $old_name = $row["nome"];
                $sql_restore_name = "UPDATE retrovibesgames SET nome=%s WHERE email=%s";
                $sql_restore_name = sprintf($sql_restore_name, $old_name, $usuario);    
            } else {
                echo "Usuário inválido: " . $conn->error;
            }
            
            if($conn->query($sql_edit_user_name) == true) {
                echo "Nome atualizado com sucesso.";
                $conn->close();
                return true;
            } else {
                echo "Falha ao atualizar o nome: " . $conn->error;
                $conn->query($sql_restore_name);
                $conn->close();
                return $conn->errno;
            }
        }

        //Atualizar senha
        if ($tipo == 2) {
            $sql_edit_user_pass = "UPDATE retrovibesgames SET pass=%s WHERE email=%s";
            $sql_edit_user_pass = sprintf($sql_edit_user_pass, $senha, $usuario);

            //Salva as informações antigas para caso o update dê errado
            $sql_bkp_user = "SELECT * FROM clientes WHERE email='%s'";
            $sql_bkp_user = sprintf($sql_bkp_user, $usuario);
            $old_data = ($conn->query($sql_bkp_user));
            if ($old_data->num_rows > 0) {
                $row = $result->fetch_assoc();
                $old_pass = $row["pass"];
                $sql_restore_pass = "UPDATE retrovibesgames SET pass=%s WHERE email=%s";
                $sql_restore_pass = sprintf($sql_restore_pass, $old_pass, $usuario);
            } else {
                echo "Usuário inválido: " . $conn->error;
            }

            if($conn->query($sql_edit_user_pass) == true) {
                echo "Nome atualizado com sucesso.";
                $conn->close();
                return true;
            } else {
                echo "Falha ao atualizar o nome: " . $conn->error;
                $conn->query($sql_restore_pass);
                $conn->close();
                return $conn->errno;
            }

        }

    }


?>