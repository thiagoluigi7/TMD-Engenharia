<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Homepage do Sistema Web da RetroVibes™ Games">
        <meta name="author" content="TMD-Engenharia">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="Css/style.css" />
    </head>
    <body>
        <header>
            <H1> RetroVibes™ Games </H1>
        </header>
    </body>
</html>
    
<?php 
    
    session_start();

    //Ja tem sessao definida se e visitante ou adm
    if (!empty($_SESSION['status'])) {
        
        //Eh adm
        if ($_SESSION['status'] == 0) {

            echo "<H3>"; 
            echo "Seja bem-vindo à central de administração do 
                  sistema web da RetroVibes™ Games!";
            echo "</H3>";
        
        //Eh visitante
        } else {
            
            //Ja esta logado
            if(isset($_SESSION['user'])) {
                
                echo "<H3>"; 
                echo "Seja bem-vindo à área do cliente no 
                      sistema web da RetroVibes™ Games!";
                echo "</H3>";

                $usuario = $_SESSION['user'];
                echo $usuario;
                echo "<br>";
                echo "<br>";

                $form5 = "<form method=%s action=%s>";
                $form6 = "<button type=%s>Update</button>";
                $form7 = "</form>";

                $post = "post";
                $submit = "submit";
                $var3 = "/controle/update.php";

                echo sprintf ($form5, $post, $var3);
                echo sprintf ($form6, $submit);
                echo $form7;

                $form5 = "<form method=%s action=''>";
                $form6 = "<button type=%s name=%s>Logout</button>";
                $form7 = "</form>";

                $post = "post";
                $submit = "submit";
                $var3 = "homepage.php";
                $nome = "logout";

                echo sprintf ($form5, $post);
                echo sprintf ($form6, $submit, $nome);
                echo $form7;

                
                if (isset($_POST['logout'])) {
                    unset($_SESSION['user']);
                    echo "Sessão finalizada com sucesso!";
                }

            
            //Nao esta logado
            } else {

                echo "<H3>"; 
                echo "Seja bem-vindo ao Sistema Web da RetroVibes™ Games";
                echo "</H3>";
    
                $form1 = "<html>";
                $form2 = "<form method=%s action=%s>";
                $form3 = "<button type=%s>Login</button>";
                $form4 = "</form>";
                $form5 = "<form method=%s action=%s>";
                $form6 = "<button type=%s>Cadastro</button>";
                $form7 = "</form>";
                $form8 = "</html>";
        
                $post = "post";
                $submit = "submit";
                $var3 = "/controle/login.php";
                $var4 = "/controle/cadastro.php";
        
            
                echo $form1;
                echo sprintf ($form2, $post, $var3);
                echo sprintf ($form3, $submit);
                echo $form4;
                echo sprintf ($form5, $post, $var4);
                echo sprintf ($form6, $submit);
                echo $form7;
                echo $form8;
            
            }

        }
    
    //Primeiro acesso
    } else {
        
        //Define se eh adm ou visitante
        $_SESSION['status'] = $_POST['status'];

        //Se for adm
        if ($_SESSION['status'] == 0) {

            echo "<H3>"; 
            echo "Seja bem-vindo à central de administração do 
                  sistema web da RetroVibes™ Games!";
            echo "</H3>";
        
        //Se for visitante
        } else {
    
            echo "<H3>"; 
            echo "Seja bem-vindo à área do cliente no 
                  sistema web da RetroVibes™ Games!";
            echo "</H3>";
    
            $form1 = "<html>";
            $form2 = "<form method=%s action=%s>";
            $form3 = "<button type=%s>Login</button>";
            $form4 = "</form>";
            $form5 = "<form method=%s action=%s>";
            $form6 = "<button type=%s>Cadastro</button>";
            $form7 = "</form>";
            $form8 = "</html>";
    
            $post = "post";
            $submit = "submit";
            $var3 = "/controle/login.php";
            $var4 = "/controle/cadastro.php";
    
        
            echo $form1;
            echo sprintf ($form2, $post, $var3);
            echo sprintf ($form3, $submit);
            echo $form4;
            echo sprintf ($form5, $post, $var4);
            echo sprintf ($form6, $submit);
            echo $form7;
            echo $form8;
            
         
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