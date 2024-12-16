<?php

namespace config;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $db_name = 'blog_db';
    private $username = 'alex';
    private $password = 'Monlau2024';
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            echo "conexión correcta";
        } catch(PDOException $exception) {
            echo "Error de conexion: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>