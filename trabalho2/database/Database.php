<?php
// constantes do BD
    define('HOST', 'localhost');
    define('DBNAME', 'ecommerce');
    define('USER', 'root');
    define('PASSWORD', '');

    class Database{
        protected $pdo;

        function __construct(){
            $this->connection();
        }

        private function connection(){
            try 
            {
                $this->pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
            } 
            catch (PDOException $e) 
            {
                echo "Error to connect with Database!".$e->getMessage();
                die();
            }
        }
        public function closeConnection() {
            $this->pdo = null; // Fecha a conexão com o banco de dados
        }

    }
?>