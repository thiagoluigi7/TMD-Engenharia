<?php

    include_once 'autenticar.php';
    include_once '../Persistence/connection.php';

    session_start();

    $conn = null;
    
    if($conn == null){
        $conn = new Connection();
        $conn = $conn->getConnection();
        $sql_gerente = "CREATE TABLE IF NOT EXISTS `retrowavedb`.`Gerente` (
                        idGerente INT NOT NULL AUTO_INCREMENT,
                        nome VARCHAR(60) NOT NULL,
                        cpf VARCHAR(11) NOT NULL,
                        salario DECIMAL(10,2) NOT NULL,
                        telefone VARCHAR(11) NOT NULL,
                        senha VARCHAR(45) NOT NULL,
                        endereco VARCHAR(200) NOT NULL,
                        email VARCHAR(100) NOT NULL,
                        PRIMARY KEY (idGerente),
                        UNIQUE INDEX idGerente_UNIQUE (idGerente ASC),
                        UNIQUE INDEX cpf_UNIQUE (cpf ASC))
                        ENGINE = InnoDB;";

        $sql_funcionario = "CREATE TABLE IF NOT EXISTS `retrowavedb`.`Funcionario` (
                            `idFuncionario` INT NOT NULL AUTO_INCREMENT,
                            `nome` VARCHAR(60) NOT NULL,
                            `cpf` VARCHAR(11) NOT NULL,
                            `salario` DECIMAL(10,2) NOT NULL,
                            `email` VARCHAR(100) NOT NULL,
                            `telefone` VARCHAR(11) NOT NULL,
                            `senha` VARCHAR(45) NOT NULL,
                            `endereco` VARCHAR(200) NOT NULL,
                            `Gerente_idGerente` INT NOT NULL,
                            PRIMARY KEY (`idFuncionario`, `Gerente_idGerente`),
                            UNIQUE INDEX `idFuncionario_UNIQUE` (`idFuncionario` ASC),
                            UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
                            INDEX `fk_Funcionario_Gerente1_idx` (`Gerente_idGerente` ASC),
                            CONSTRAINT `fk_Funcionario_Gerente1`
                            FOREIGN KEY (`Gerente_idGerente`)
                            REFERENCES `retrowavedb`.`Gerente` (`idGerente`)
                            ON DELETE NO ACTION
                            ON UPDATE NO ACTION)
                            ENGINE = InnoDB;";

        $sql_cliente = "CREATE TABLE IF NOT EXISTS `retrowavedb`.`Cliente` (
                        `idCliente` INT NOT NULL AUTO_INCREMENT,
                        `nome` VARCHAR(60) NOT NULL,
                        `cpf` VARCHAR(11) NOT NULL,
                        `email` VARCHAR(100) NOT NULL,
                        `telefone` VARCHAR(11) NOT NULL,
                        `senha` VARCHAR(45) NOT NULL,
                        `endereco` VARCHAR(200) NOT NULL,
                        PRIMARY KEY (`idCliente`),
                        UNIQUE INDEX `idCliente_UNIQUE` (`idCliente` ASC),
                        UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
                        ENGINE = InnoDB;";

        $sql_itens = "CREATE TABLE IF NOT EXISTS `retrowavedb`.`Itens` (
                        `idItem` INT NOT NULL AUTO_INCREMENT,
                        `nome` VARCHAR(100) NOT NULL,
                        `periodoLoc` INT NOT NULL,
                        `valor` DECIMAL(10,2) NOT NULL,
                        `quant` INT NOT NULL,
                        PRIMARY KEY (`idItem`),
                        UNIQUE INDEX `idItem_UNIQUE` (`idItem` ASC))
                        ENGINE = InnoDB;";

        $sql_loc = "CREATE TABLE IF NOT EXISTS `retrowavedb`.`Locacao` (
                        `idLoc` INT NOT NULL AUTO_INCREMENT,
                        `Itens_idItem` INT NOT NULL,
                        `Cliente_idCliente` INT NOT NULL,
                        `Funcionario_idFuncionario` INT NOT NULL,
                        `dataInicial` DATE NOT NULL,
                        `dataFinal` DATE NOT NULL,
                        `valorTotal` DECIMAL(10,2) NOT NULL,
                        PRIMARY KEY (`idLoc`, `Itens_idItem`, `Cliente_idCliente`, `Funcionario_idFuncionario`),
                        INDEX `fk_Locacao_Cliente1_idx` (`Cliente_idCliente` ASC),
                        INDEX `fk_Locacao_Funcionario1_idx` (`Funcionario_idFuncionario` ASC),
                        CONSTRAINT `fk_Locacao_Itens1`
                        FOREIGN KEY (`Itens_idItem`)
                        REFERENCES `retrowavedb`.`Itens` (`idItem`)
                        ON DELETE NO ACTION
                        ON UPDATE NO ACTION,
                        CONSTRAINT `fk_Locacao_Cliente1`
                        FOREIGN KEY (`Cliente_idCliente`)
                        REFERENCES `retrowavedb`.`Cliente` (`idCliente`)
                        ON DELETE NO ACTION
                        ON UPDATE NO ACTION,
                        CONSTRAINT `fk_Locacao_Funcionario1`
                        FOREIGN KEY (`Funcionario_idFuncionario`)
                        REFERENCES `retrowavedb`.`Funcionario` (`idFuncionario`)
                        ON DELETE NO ACTION
                        ON UPDATE NO ACTION)
                        ENGINE = InnoDB;";


        $sql_gerente_insert = "INSERT INTO `gerente` (`nome`,`cpf`,`salario`,`telefone`,`senha`,`endereco`,`email`)  VALUES ('Vlad','99999999999',5500.00,'35985858585','admin234','Lavras','vlad@ufla.br');";

        $conn->query($sql_gerente);
        $conn->query($sql_funcionario);
        $conn->query($sql_cliente);
        $conn->query($sql_itens);
        $conn->query($sql_loc);
        $conn->query($sql_jogos);
        $conn->query($sql_videogames);
        $conn->query($sql_gerente_insert);
    }

    if(isset($_POST['funcao'])) {
        if($_POST['funcao'] == "gerente") {
            if(autenticar($_POST["cpf"], $_POST["senha"], $_POST["funcao"]) == true) {
                //echo "Gerente autenticado.";
                echo "<script type='text/javascript'>location.href = '/View/Gerente/I_HomeGerente.html';</script>";
            } else {
                //echo "Erro ao autenticar o gerente.";
                echo "<script type='text/javascript'>location.href = '/View/IE_Login.html';</script>";
            }
        } else if ($_POST['funcao'] == "funcionario") {
            if(autenticar($_POST["cpf"], $_POST["senha"], $_POST["funcao"]) == true) {
                //echo "Funcionário autenticado.";
                echo "<script type='text/javascript'>location.href = '/View/Funcionario/I_HomeFunc.html';</script>";
            } else {
                //echo "Erro ao autenticar o funcionário.";
                echo "<script type='text/javascript'>location.href = '/View/IE_Login.html';</script>";
            }
        } else if ($_POST['funcao'] == "cliente") {
            if(autenticar($_POST["cpf"], $_POST["senha"], $_POST["funcao"]) == true) {
                //echo "Cliente autenticado.";
                $cpf = $_POST["cpf"];
                $_SESSION["cpf"] = $cpf;
                echo "<script type='text/javascript'>location.href = '/View/Cliente/I_HomeCliente.html';</script>";
            } else {
                //echo "Erro ao autenticar o cliente.";
                echo "<script type='text/javascript'>location.href = '/View/IE_Login.html';</script>";
            }
        }
    }
?>