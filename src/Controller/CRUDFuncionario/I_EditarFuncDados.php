<?php 

    include_once '../../Persistence/connection.php';
    include_once '../../Persistence/FuncionarioDAO/funcionarioDAO.php';

    $connection = new Connection();
    $connection = $connection->getConnection();
    $funcionariodao = new funcionarioDAO();
    $cpf = $_POST['cpf'];
    $funcionario = $funcionariodao->consultarCPF($cpf, $connection);


    echo "
        <html>
            <head>
                <meta charset='UTF-8'>
                <title>Editar Funcionario</title>
            </head>

            <body>
                <form action='../../../Controller/CRUDFuncionario/editarFuncionario.php' method='POST'>
                    <h1>Editar Funcionario</h1>

                    CPF:  <input type='text' name='cpf' readonly value='"  . $funcionario->getCpf() . "'> 
                    Nome: <input type='text' name='nome' value='"          . $funcionario->getNome() ."'>
                    Salário: <input type='text' name='salario' value='"    . $funcionario->getSalario() . "'>
                    Endereço: <input type='text' name='endereco' value='"  . $funcionario->getEndereco() . "'>
                    Email: <input type='email' name='email' value='"       . $funcionario->getEmail() . "'>
                    Telefone: <input type='text' name='telefone' value='"  . $funcionario->getTelefone() . "'>
                    Senha: <input type='password' name='senha' value='"    . $funcionario->getSenha()    . "'>
                    
                    <input type='submit' value='Editar'>

                </form>
            </body>
        </html>
        ";

?>