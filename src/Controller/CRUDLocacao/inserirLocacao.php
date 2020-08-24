<?php

    include_once '../../Model/locacao.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/LocacaoDAO/locacaoDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    // $dataInicial = $_POST["dataLocação"];
    // $dataFinal = $_POST["dataDevolução"];
    // $valorTotal = $_POST["R$"];
    // $nomeFuncionario = $_POST["funcionario"];
    // $nomeCliente = $_POST["cliente"];
    // $item = $_POST["plataforma"];

    $locacao = new Locacao($_POST['dataLocacao'], $_POST["dataDevolucao"], $_POST["R$"], $_POST["funcionario"], $_POST["cliente"], $_POST["plataforma"]);
    $locacaodao = new locacaoDAO();
    if($locacaodao->salvar($locacao, $connection) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IS_SucessoF.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IE_ErroF.html';</script>";
    }

?>