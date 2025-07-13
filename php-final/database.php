<?php 
    class Database {
        
        private $server = "localhost";
        private $user = "root";
        private $pwd = "";
        private $db = "cibernarium_cursos";
        public $conn;

        public function getConnection() {
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->user, $this->pwd); 
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }

        private function query($sqlQuery) {
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt;
        }

        public function queryOne($sqlQuery) {
            $stmt = $this->query($sqlQuery);
            return $stmt->fetch();
        }

        public function queryAll($sqlQuery) {
            $stmt = $this->query($sqlQuery);
            return $stmt->fetchAll();
        }
    }
?>
