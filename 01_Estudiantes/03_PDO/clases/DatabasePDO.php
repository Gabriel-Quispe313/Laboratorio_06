<?php
class DatabasePDO {
    private $host = "localhost";
    private $dbname = "db_instituto";
    private $user = "root";
    private $password = "";

    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->user,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            die ("Error de conexion: " . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
?>