<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Página de login do Sistema Web da RetroVibes™ Games">
        <meta name="author" content="TMD-Engenharia">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../Css/style.css" />
    </head>

    <body>
        <header>
            <H2>Bem-Vindo a Página de Login</H2>
        </header>
        <main>
            <form action="" method="post">
                Email: <input type="text" name="email">
                Senha: <input type="password" name="senha">
                <input type="submit" name="submit" value="Login!">
            </form>
        </main>
    </body>
</html>

<?php

    require_once ("../Dbcode/login_db.php");

    //Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['user']);
    
    if (isset($_POST['submit'])) {

        if (!empty($_POST["email"]) && !empty($_POST["senha"])) {

            function clean($str) {
                $str = @trim($str);
                if(get_magic_quotes_gpc()) {
                    $str = stripslashes($str);
                }
                return mysqli_real_escape_string($str);
            }

            $email = $_POST["email"];
            $senha = $_POST["senha"];


            //clean($email);
            //clean($senha);

            if (login_user($email, $senha) == true) {
                $_SESSION['user'] = $email;
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