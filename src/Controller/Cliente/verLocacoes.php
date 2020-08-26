<?php

    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/LocacaoDAO/locacaoDAO.php';
    include_once '../../Persistence/clienteDAO.php';

    session_start();

    $connection = new Connection();
    $connection = $connection->getConnection();

    $connection2 = new Connection();
    $connection2 = $connection2->getConnection();

    $cpf = $_SESSION['cpf'];

    $clientedao = new clienteDAO();
    $cliente = $clientedao->consultarCPF($cpf, $connection2);

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
            background-color: #fcde34b2;
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
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Valor Total</th>
            </tr>";
        while($registro = $resultado->fetch_assoc()) {
            if($registro['nomeCliente'] == $cliente->getNome()){
            echo "<tr>
                    <td>".$registro['dataInicial']."</td>
                    <td>".$registro['dataFinal']."</td>
                    <td>".$registro['valorTotal']."</td>";
            echo "</tr>";
            }

        }
    }
    echo "</div></body>";
    $connection->close();


?>