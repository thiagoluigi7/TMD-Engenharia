<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Página de cadastro do Sistema Web da RetroVibes™ Games">
        <meta name="author" content="TMD-Engenharia">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../Css/style.css" />
    </head>

    <body>
        <header>
            <H2>Por favor faça o cadastro</H2>
        </header>
        <main>
            <form action = "cadastro.php" method="post">
                Nome: <input type="text" name="nome" required /><br>
                E-mail: <input type="email" name="email" required /><br>
                Senha: <input type="password" name="senha" required /><br>
                <input type="submit" name="submit" value="Cadastrar!">
            </form>
        </main>
    </body>
</html>

<?php

    require_once("../Dbcode/cadastro_db.php");

    if (isset($_POST['submit'])) {

        $nome  = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];


        if (!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) { 
            if (add_user($nome, $email, $senha) == true) {
                $form1 = "<form method=%s action=%s>";
                $form2 = "<form method=%s action=%s>";
                $form3 = "<button type=%s>Voltar para a Home</button>";

                $var1 = "post";
                $var2 = "../homepage.php";
                $var3 = "submit";

                echo sprintf($form1, $var1, $var2);
                echo sprintf($form2, $var1, $var2);
                echo sprintf($form3, $var3);
            }
        }

    }

?>

<html>
    <body>
        <footer>
            <center>&copy; 2020</center>
        </footer>
    </body>
</html>