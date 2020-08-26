<?php

    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/clienteDAO.php';

    session_start();

    $connection = new Connection();
    $connection = $connection->getConnection();

    $cpf = $_SESSION['cpf'];

    $clientedao = new clienteDAO();
    $resultado = $clientedao->consultar($connection);

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
            background-color: #4e9bffb9;
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
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Senha</th>
                <th>Endereço</th>
            </tr>";
        while($registro = $resultado->fetch_assoc()) {
            if($registro['cpf'] == $cpf){
            echo "<tr>
                    <td>".$registro['nome']."</td>
                    <td>".$registro['cpf']."</td>
                    <td>".$registro['email']."</td>
                    <td>".$registro['telefone']."</td>
                    <td>".$registro['senha']."</td>
                    <td>".$registro['endereco']."</td>";
            echo "</tr>";
            }

        }
    }
    echo "</div></body>";
    $connection->close();


?>