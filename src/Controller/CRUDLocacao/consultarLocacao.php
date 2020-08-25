<?php

    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/LocacaoDAO/locacaoDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();

    $locacaodao = new locacaoDAO();
    $resultado = $locacaodao->consultar($connection);

    if ($resultado->num_rows > 0) {
        echo "
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