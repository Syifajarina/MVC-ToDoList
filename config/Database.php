<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "todo_db";
    protected $connection;

    public function __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host=$this->host;dbname=$this->database",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
