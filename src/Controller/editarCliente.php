<?php

    include_once '../Model/cliente.php'; 
    include_once '../Persistence/connection.php';
    include_once '../Persistence/clienteDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $cliente = new Cliente($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["telefone"], $_POST["senha"], $_POST["endereco"]);

    $clientedao = new clienteDAO();
    if($clientedao->editar($cliente, $connection) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IS_Sucesso.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IE_Erro.html';</script>";
    }

?>