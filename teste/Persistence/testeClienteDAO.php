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
            $connection = new Connection();
            $connection = $connection->getConnection();
            
            $cliente = new Cliente("Davi", "11111111111", "davi@ufla.br", "11911111111", "123", "Lavras");

            $cpf = '11111111111';

            $sql = "SELECT * FROM `cliente`";
            $res = $connection->query($sql);
            if (!empty($res) and $res->num_rows > 0) {
                while ($registro = $res->fetch_assoc()) {
                    if ($registro['cpf'] == $cpf) {
                        $this->assertEquals($cliente->getNome(),    $registro['nome']);
                        $this->assertEquals($cliente->getCpf(),     $registro['cpf']);
                        $this->assertEquals($cliente->getEmail(),   $registro['email']);
                        $this->assertEquals($cliente->getTelefone(),$registro['telefone']);
                        $this->assertEquals($cliente->getSenha(),   $registro['senha']);
                        $this->assertEquals($cliente->getEndereco(),$registro['endereco']);
                    }
                }
            }
        }

        public function testeRemover() {

            $connection = new Connection();
            $connection = $connection->getConnection();

            $connection2 = new Connection();
            $connection2 = $connection2->getConnection();

            $connection3 = new Connection();
            $connection3 = $connection3->getConnection();

            $cliente = new Cliente("Megami", "987", "Megami@ufla.br", "987654321", "123", "Lavras");
            $clientedao = new clienteDAO();
            $clientedao->salvar($cliente, $connection2);

            $cpf = '987';
            $sql = "DELETE FROM `cliente` WHERE `cliente`.`cpf` = '" . $cpf . "'";

            if($connection3->query($sql) === TRUE) {
                $sql2 = "SELECT FROM `cliente` WHERE `cliente`.`cpf` = '" . $cpf . "'";
                $this->assertFalse($connection3->query($sql2));
                $connection3->close();
                return true;
            }   
        }

    }
?>