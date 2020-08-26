<?php

    include_once '../../Model/cliente.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/clienteDAO.php';

    session_start();

    $connection = new Connection();
    $connection = $connection->getConnection();

    $connection2 = new Connection();
    $connection2 = $connection2->getConnection();

    $clientedao = new clienteDAO();

    $cpf = $_SESSION['cpf'];

    $cliente = $clientedao->consultarCPF($cpf, $connection);

    $senha = $_POST['senha'];
    $cliente->setSenha($senha);

    $endereco = $_POST['endereco'];
    $cliente->setEndereco($endereco);

    if($clientedao->editar($cliente, $connection2) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Cliente/IS_SucessoCliente.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Cliente/IE_ErroCliente.html';</script>";
    }

?>