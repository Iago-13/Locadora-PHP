<?php
require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {
    private $cliente;

    public function __construct() {
        $this->cliente = new Cliente();
    }

    public function index() {
        $clientes = $this->cliente->listar();
        include __DIR__ . '/../views/clientes/listar.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cliente->adicionar($_POST);
            header('Location: ClienteController.php?action=index');
        } else {
            include __DIR__ . '/../views/clientes/adicionar.php';
        }
    }

    public function editar() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cliente->atualizar($id, $_POST);
            header('Location: ClienteController.php?action=index');
        } else {
            $cliente = $this->cliente->buscar($id);
            include __DIR__ . '/../views/clientes/editar.php';
        }
    }

    public function deletar() {
        $id = $_GET['id'];
        $this->cliente->deletar($id);
        header('Location: ClienteController.php?action=index');
    }
}

$controller = new ClienteController();
$action = $_GET['action'] ?? 'index';
$controller->$action();
