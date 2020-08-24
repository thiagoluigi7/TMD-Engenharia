<?php

    include_once '../Persistence/connection.php';
    include_once '../Persistence/clienteDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $clientedao = new clienteDAO();
    $resultado = $clientedao->consultar($connection);

    if ($resultado->num_rows > 0) {
        echo "
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
            echo "<tr>";
            echo    "<td>".$registro['nome']."</td>
                    <td>".$registro['cpf']."</td>
                    <td>".$registro['email']."</td>
                    <td>".$registro['telefone']."</td>
                    <td>".$registro['senha']."</td>
                    <td>".$registro['endereco']."</td>";
            echo "</tr>";

        }
    }
    $connection->close();


?>