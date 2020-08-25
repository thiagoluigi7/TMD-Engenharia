<?php 

    include_once '../../Model/locacao.php';
    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/locacaoDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();
    $locacaodao = new locacaoDAO();
    $locacao = $locacaodao->consultarId($id, $connection);

    echo "
        <html>
            <head>
                <meta charset='UTF-8'>
                <title>Editar Locacao</title>
                <link rel='stylesheet' href='../View/css/style.css'>
                <link rel='stylesheet' href='../View/css/Gerente.css'>
            </head>

            <body>
                <div id='interface'>
                    <div id='retangulo' class='amarelo'></div>
                    
                    <div id='fundoIserir' class='amarelo'>
                        <form action='editarLocacao.php' method='POST'>
                            <h1>Editar Cliente</h1>


                            <input type='text' name='id' readonly value='"   . $locacao->getId() . "'>
                            <input type='date' name='dataInicial' value='"          . $cliente->getDataInicial(). "'>
                            <input type='date' name='dataFinal' value='"  . $cliente->getDataFinal() . "'>
                            <input type='text' name='valorTotal' value='"       . $cliente->getValorTotal() . "'>
                            <input type='text' name='nomeFuncionario' value='"  . $cliente->getNomeFuncionario() ."'>
                            <input type='text' name='nomeCliente' value='"    . $cliente->getNomeCliente() . "'>  
                            <input type='text' name='item' value='"    . $cliente->getItem() . "'>    
                            
                            <div id='botao'>
                            <input type='submit' value='Editar' class='botaoEnviar amareloClaro'>
                            </div>

                        </form>
                    </div>
                </div>
            </body>
        </html>
        ";

?>