<?php

    include_once '../../Model/item.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/ItensDAO/itemDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $item = new Item($_POST["nome"], 
                     $_POST["periodoLoc"], 
                     $_POST["valor"], 
                     $_POST["copias"]);

    $itemdao = new itemDAO();

    if($itemdao->salvar($item, $connection) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IS_SucessoF.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IE_ErroF.html';</script>";
    }

?>