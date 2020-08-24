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
            </head>

            <body>
                <form action='editarCliente.php' method='POST'>
                    <h1>Editar Cliente</h1>

                    CPF: <input type='text' name='cpf' readonly value='"   . $cliente->getCpf() . "'>
                    Nome: <input type='text' name='nome' value='"          . $cliente->getNome(). "'>
                    Endereço: <input type='text' name='endereco' value='"  . $cliente->getEndereco() . "'>
                    Email: <input type='email' name='email' value='"       . $cliente->getEmail() . "'>
                    Telefone: <input type='text' name='telefone' value='"  . $cliente->getTelefone() ."'>
                    Senha: <input type='password' name='senha' value='"    . $cliente->getSenha() . "'>   
                    
                    <input type='submit' value='Editar'>

                </form>
            </body>
        </html>
        ";

?>