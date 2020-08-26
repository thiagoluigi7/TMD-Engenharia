<?php

    include_once '../../Model/funcionario.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/FuncionarioDAO/funcionarioDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $funcionariodao = new funcionarioDAO();
    $funcionario = new Funcionario($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST['salario'], $_POST["telefone"], $_POST["senha"], $_POST["endereco"]);

    if($funcionariodao->editar($funcionario, $connection) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IS_Sucesso.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Gerente/IE_Erro.html';</script>";
    }

?>