<?php
require_once 'config/Database.php';

class Todo extends Database {
    private $table = "todos";

    public function getAllTasks() {
        $query = "SELECT * FROM $this->table ORDER BY created_at DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($title) {
        $query = "INSERT INTO $this->table (title, completed) VALUES (:title, 0)";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute(['title' => $title]);
    }

    public function toggleTask($id) {
        $query = "UPDATE $this->table SET completed = NOT completed WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    public function deleteTask($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}