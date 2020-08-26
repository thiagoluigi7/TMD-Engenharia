<?php

    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/ItensDAO/itemDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $itemdao = new itemDAO();
    $resultado = $itemdao->consultar($connection);

    if ($resultado->num_rows > 0) {
        echo "
        <style>
            table {
            border-collapse: collapse;
            width: 100%;
            }

            th, td {
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
            background-color: #cc0000b4;
            color: black;
            }

            #interface {
                position: relative;
                width: 1300px;
                height: 600px;
                margin: auto auto auto auto;
                box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.315);
                background-color: white;
                padding: 10px;
            }
            
            #retangulo {
                position: absolute;
                width: 100%;
                height: 45px;
                left: 0px;
                top: 0px;
                background: #ffd82cfd; 
                 
            }

        </style>
        <body>
        <div id='interface'>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Período de locação</th>
                <th>Valor</th>
                <th>Quantidade</th>
            </tr>";
        while($registro = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>".$registro['idItem']."</td>
                    <td>".$registro['nome']."</td>
                    <td>".$registro['periodoLoc']."</td>
                    <td>".$registro['valor']."</td>
                    <td>".$registro['quant']."</td>";
            echo "</tr>";

        }
    }
    echo "</div></body>";
    $connection->close();


?>