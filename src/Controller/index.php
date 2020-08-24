<?php

    include_once 'autenticar.php';
    include_once '../Persistence/connection.php';

    if(isset($_POST['funcao'])) {
        if($_POST['funcao'] == "gerente") {
            if(autenticar($_POST["cpf"], $_POST["senha"], $_POST["funcao"]) == true) {
                //echo "Gerente autenticado.";
                echo "<script type='text/javascript'>location.href = '/View/Gerente/I_HomeGerente.html';</script>";
            } else {
                //echo "Erro ao autenticar o gerente.";
                echo "<script type='text/javascript'>location.href = '/View/IE_Login.html';</script>";
            }
        } else if ($_POST['funcao'] == "funcionario") {
            if(autenticar($_POST["cpf"], $_POST["senha"], $_POST["funcao"]) == true) {
                //echo "Funcionário autenticado.";
                echo "<script type='text/javascript'>location.href = '/View/Funcionario/I_HomeFunc.php';</script>";
            } else {
                //echo "Erro ao autenticar o funcionário.";
                echo "<script type='text/javascript'>location.href = '/View/IE_Login.html';</script>";
            }
        } else if ($_POST['funcao'] == "cliente") {
            if(autenticar($_POST["cpf"], $_POST["senha"], $_POST["funcao"]) == true) {
                //echo "Cliente autenticado.";
                echo "<script type='text/javascript'>location.href = '/View/Cliente/I_HomeCliente.php';</script>";
            } else {
                //echo "Erro ao autenticar o cliente.";
                echo "<script type='text/javascript'>location.href = '/View/IE_Login.html';</script>";
            }
        }
    }
?>
