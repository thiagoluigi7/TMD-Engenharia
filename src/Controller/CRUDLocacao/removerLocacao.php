<?php

    include_once '../../Model/locacao.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/LocacaoDAO/locacaoDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $connection2 = new Connection();
    $connection2 = $connection2->getConnection();

    $locacaodao = new locacaoDAO();
    $locacao = $locacaodao->consultarId($_POST['id'], $connection);

    if($locacaodao->remover($locacao, $connection2) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IS_SucessoF.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IE_ErroF.html';</script>";
    }

?>