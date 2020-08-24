<?php

    include_once '../../Model/funcionario.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/FuncionarioDAO/funcionarioDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $cpf = $_POST["cpf"];

    $funcionariodao = new funcionarioDAO();
    if($funcionariodao->remover($cpf, $connection) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IS_Sucesso.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IE_Erro.html';</script>";
    }

?>