<?php 

    include_once '../Persistence/connection.php';
    include_once '../Persistence/clienteDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();
    $clientedao = new clienteDAO();
    $cliente = $clientedao->consultarCPF($_POST['cpf'], $connection);

    echo "
        <html>
            <head>
                <meta charset='UTF-8'>
                <title>Editar Cliente</title>
                <link rel='stylesheet' href='../View/css/style.css'>
                <link rel='stylesheet' href='../View/css/Gerente.css'>
            </head>

            <body>
                <div id='interface'>
                    <div id='retangulo' class='amarelo'></div>
                    
                    <div id='fundoIserir' class='amarelo'>
                        <form action='editarCliente.php' method='POST'>
                            <h1>Editar Cliente</h1>


                            <input type='text' name='cpf' readonly value='"   . $cliente->getCpf() . "'>
                            <input type='text' name='nome' value='"          . $cliente->getNome(). "'>
                            <input type='text' name='endereco' value='"  . $cliente->getEndereco() . "'>
                            <input type='email' name='email' value='"       . $cliente->getEmail() . "'>
                            <input type='text' name='telefone' value='"  . $cliente->getTelefone() ."'>
                            <input type='password' name='senha' value='"    . $cliente->getSenha() . "'>   
                            
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