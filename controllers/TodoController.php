<?php
require_once 'models/Todo.php';

class TodoController {
    private $model;

    public function __construct() {
        $this->model = new Todo();
    }

    public function index() {
        $tasks = $this->model->getAllTasks();
        require 'views/todo/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
            $this->model->addTask($_POST['title']);
        }
        header('Location: index.php');
    }

    public function toggle() {
        if (isset($_POST['id'])) {
            $this->model->toggleTask($_POST['id']);
        }
        header('Location: index.php');
    }

    public function delete() {
        if (isset($_POST['id'])) {
            $this->model->deleteTask($_POST['id']);
        }
        header('Location: index.php');
    }
}
