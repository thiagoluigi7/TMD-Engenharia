<?php

    include_once '../../Model/item.php'; 
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/ItensDAO/itemDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $id = $_POST["id"];

    $itemdao = new itemDAO();
    if($itemdao->remover($id, $connection) == TRUE) {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IS_SucessoF.html';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/View/Funcionario/IE_ErroF.html';</script>";
    }

?>