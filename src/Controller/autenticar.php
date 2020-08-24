<?php

    include_once "../Persistence/connection.php";

    function autenticar($cpf, $senha, $tipo) {
        $connection = new Connection();
        $conn = $connection->getConnection();
        return selecionarAutenticacao($cpf, $senha, $tipo, $conn);
    }

    function selecionarAutenticacao($cpf, $senha, $tipo, $conn) {
        if ($tipo == "gerente") {
            if(autenticarGerente($cpf, $senha, $conn) == true) {
                return true;
            } else {
                return false;
            }
        } else if ($tipo == "funcionario") {
            if(autenticarFuncionario($cpf, $senha, $conn) == true) {
                return true;
            } else {
                return false;
            }
        } else {
            if(autenticarCliente($cpf, $senha, $conn) == true) {
                return true;
            } else {
                return false;
            }
        }
    }

    function autenticarGerente($cpf, $senha, $conn) {
        $sql = "SELECT * FROM `gerente`";
        $res = $conn->query($sql);
        if (!empty($res) and $res->num_rows > 0) {
            while ($registro = $res->fetch_assoc()) {
                if (($registro['cpf'] == $cpf) and ($registro['senha'] == $senha))  {
                    $conn->close();
                    return true;
                } 
            }
            $conn->close();
            return false;
        } else {
            echo "Falha ao realizar login: " . $conn->error;
            $conn->close();
            return $conn->errno;
        }
    }

    function autenticarFuncionario($cpf, $senha, $conn) {
        $sql = "SELECT * FROM `funcionario`";
        $res = $conn->query($sql);
        if (!empty($res) and $res->num_rows > 0) {
            while ($registro = $res->fetch_assoc()) {
                if (($registro['cpf'] == $cpf) and ($registro['senha'] == $senha))  {
                    $conn->close();
                    return true;
                }
            }
            $conn->close();
            return false;
        } else {
            echo "Falha ao realizar login: " . $conn->error;
            $conn->close();
            return $conn->errno;
        }
    }

    function autenticarCliente($cpf, $senha, $conn) {
        $sql = "SELECT * FROM `cliente`";
        $res = $conn->query($sql);
        if (!empty($res) and $res->num_rows > 0) {
            while ($registro = $res->fetch_assoc()) {
                if (($registro['cpf'] == $cpf) and ($registro['senha'] == $senha))  {
                    $conn->close();
                    return true;
                }
            }
            $conn->close();
            return false;
        } else {
            echo "Falha ao realizar login: " . $conn->error;
            $conn->close();
            return $conn->errno;
        }
    }


?>
