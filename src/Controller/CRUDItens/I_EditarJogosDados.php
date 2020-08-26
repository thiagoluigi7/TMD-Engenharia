<?php 

    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/ItensDAO/itemDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $itemdao = new itemDAO();
    $id = $_POST['id'];

    $item = $itemdao->consultarId($id, $connection);

    echo "
        <html>
            <head>
                <meta charset='UTF-8'>
                <title>Editar Item</title>
            </head>

            <body>
                <form action='../../../Controller/CRUDItens/editarItem.php' method='POST'>
                    <h1>Editar Item</h1>

                    ID:  <input type='text' name='id' readonly value='"                  . $item->getId() . "'> 
                    Nome: <input type='text' name='nome' value='"                        . $item->getNome() ."'>
                    Período de locação: <input type='text' name='periodoLoc' value='"    . $item->getPeriodoLoc() . "'>
                    Valor: <input type='text' name='valor' value='"                      . $item->getValor() . "'>
                    Quantidade: <input type='text' name='quant' value='"                 . $item->getQuant() . "'>

                    <input type='submit' value='Editar'>

                </form>
            </body>
        </html>
        ";

?>