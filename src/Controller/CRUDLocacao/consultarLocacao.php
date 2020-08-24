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
                <th>Id da Locação</th>
                <th>Id do item</th>
                <th>Id do Cliente</th>
                <th>Id do funcionário responsável</th>
                <th>Data de locação</th>
                <th>Data de devolução</th>
                <th>Valor Total</th>
            </tr>";
        while($registro = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo    "<td>".$registro['idLoc']."</td>
                    <td>".$registro['Itens_idItem']."</td>
                    <td>".$registro['Cliente_idCliente']."</td>
                    <td>".$registro['Funcionario_idFuncionario']."</td>
                    <td>".$registro['dataInicial']."</td>
                    <td>".$registro['dataFinal']."</td>
                    <td>".$registro['valorTotal']."</td>";
            echo "</tr>";

        }
    }
    $connection->close();


?>