<?php
require_once 'controllers/TodoController.php';

$controller = new TodoController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'toggle':
        $controller->toggle();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}