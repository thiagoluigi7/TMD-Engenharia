<html>
    <head> 
        <meta charset="UTF-8">
        <meta name="description" content="Página de edição do usuário do Sistema Web da RetroVibes™ Games">
        <meta name="author" content="TMD-Engenharia">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../Css/style.css" />
    </head>
    <body>
        <header>
            <H2>Campo para alteração de dados</H2>
        </header>
        <main>
            <form action="update.php" method="post">
                Nome: <input type="text" name="nome" /><br>
                Senha: <input type="password" name="senha" /><br>
                <input type="submit" name="submit" value="Alterar!">
            </form>
        </main>
    </body>
</html>


<?php

    require_once("../Dbcode/update_db.php");
    $usuario = $_SESSION['user'];

    //Senha e nome
    if ((!empty($_POST['nome'])) && (!empty($_POST['senha']))) {
        if (update_user($_POST['nome'], $_POST['senha'], 0, $usuario) == true) {
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

    //Só nome
    if ((!empty($_POST['nome'])) && (empty($_POST['senha']))) {
        if (update_user($_POST['nome'], $_POST['senha'], 1, $usuario) == true) {
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

    //Só senha
    if ((empty($_POST['nome'])) && (!empty($_POST['senha']))) {
        if (update_user($_POST['nome'], $_POST['senha'], 2, $usuario) == true) {
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

?>

<html>
    <body>
        <footer>
            <center>&copy; 2020</center>
        </footer>
    </body>
</html>