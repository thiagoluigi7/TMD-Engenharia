<?php

    include_once '../../Model/locacao.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/LocacaoDAO/locacaoDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $connection2 = new Connection();
    $connection2 = $connection2->getConnection();

    $locacaodao = new locacaoDAO();
    $locacao = new Locacao($_POST['dataInicial'], $_POST['dataFinal'], $_POST['valorTotal'], $_POST['nomeFuncionario'], $_POST['nomeCliente'], $_POST['item']);
    $locacao->setId($_POST['id']);

    if($locacaodao->editar($locacao, $connection2) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IS_SucessoF.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IE_ErroF.html';</script>";
    }

?>