<?php
    require_once('src/Model/cliente.php'); 
    require_once('src/Persistence/clienteDAO.php');
    require_once('src/Persistence/connection.php');
    include_once '../Persistence/connection.php';

    class testeClienteDAO extends PHPUnit\Framework\TestCase{


        public function testSalvar() {
            $correct = new Cliente(`Davi`, `11111111111`, `davi.castro@estudante.ufla.br`, `11911111111`, `123`, `Lavras`);
            $obj = new Cliente(`João`, `78945612391`, `joao@gmail.com`, `78945611654`, `987`, `Acre`);
            $this->assertEquals($correct, $obj);

        }

        public function testeConsultarCPF() {
            $cliente = new Cliente(`Davi`, `11111111111`, `davi.castro@estudante.ufla.br`, `11911111111`, `123`, `Lavras`);
            $connection = new Connection();
            $connection = $connection->getConnection();
            $cpf = 11111111111;
            $sql = "SELECT * FROM `cliente`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['cpf'] == $cpf) {
                        $nome = $registro['nome'];
                        $cpf = $registro['cpf'];
                        $email = $registro['email'];
                        $telefone = $registro['telefone'];
                        $senha = $registro['senha'];
                        $endereco = $registro['endereco'];
                        $this->assertEquals($cliente['nome'],$registro['nome']);
                        $this->assertAttributeSame($cliente['cpf'],$registro['cpf']);
                        $this->assertAttributeSame($cliente['email'],$registro['email']);
                        $this->assertAttributeSame($cliente['telefone'],$registro['telefone']);
                        $this->assertAttributeSame($cliente['senha'],$registro['senha']);
                        $this->assertAttributeSame($cliente['endereco'],$registro['endereco']);
                    }
                }
            }
        }

        public function testeRemover() {

            $cliente = new Cliente(`Davi`, `11111111111`, `davi.castro@estudante.ufla.br`, `11911111111`, `123`, `Lavras`);
            $cpf = 11111111111;
            $sql = "DELETE FROM `cliente` WHERE `cliente`.`cpf` = '" . $cpf . "'";

            $connection = new Connection();
            $connection = $connection->getConnection();

            if($connection->query($sql) === TRUE) {
                $sql2 = "SELECT FROM `cliente` WHERE `cliente`.`cpf` = '" . $cpf . "'";
                $this->assertNull($sql2);
                $connection->close();
                return true;
            }   
        }

    }
?>