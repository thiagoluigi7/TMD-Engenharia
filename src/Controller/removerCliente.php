<?php

    include_once '../Model/cliente.php'; 
    include_once '../Persistence/connection.php';
    include_once '../Persistence/clienteDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $cpf = $_POST["cpf"];

    $clientedao = new clienteDAO();
    if($clientedao->remover($cpf, $connection) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IS_Sucesso.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IE_Erro.html';</script>";
    }

?>