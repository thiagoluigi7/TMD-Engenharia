<?php

    class Connection {

        private $servername;
        private $username;
        private $password;
        private $database;
        private $connection;

        function __construct() { 
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->database = "retrowavedb";
        }

        function getConnection () {
            $connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if ($connection->connect_error) {
                die("A conexão falhou: " . $connection->connect_error);
            } else {
                return $connection;
            }
        }

    }

?>