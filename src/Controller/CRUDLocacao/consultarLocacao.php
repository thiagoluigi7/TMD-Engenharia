<?php

    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/LocacaoDAO/locacaoDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $locacaodao = new locacaoDAO();
    $resultado = $locacaodao->consultar($connection);

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
                <th>Nome do cliente</th>
                <th>Email do cliente</th>
                <th>Nome do funcionário responsável</th>
                <th>Data de locação</th>
                <th>Data de devolução</th>
                <th>Valor Total</th>
            </tr>";
        while($registro = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo    "<td>".$registro['nomeCliente']."</td>
                    <td>".$registro['emailCliente']."</td>
                    <td>".$registro['nomeFuncionario']."</td>
                    <td>".$registro['dataInicial']."</td>
                    <td>".$registro['dataFinal']."</td>
                    <td>".$registro['valorTotal']."</td>";
            echo "</tr>";

        }
    }
    $connection->close();


?>