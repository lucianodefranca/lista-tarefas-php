<?php 

    class Conexao {

        private $host = '127.0.0.1';
        private $dbname = 'lista_tarefas_com_pdo';
        private $user = 'root';
        private $pass = '';

        public function conectar() {
            try {

                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conexao;

            } catch (PDOException $e) {

                echo '<p>'.$e->getMessage().'</p>';

            }
        }
    }



?>