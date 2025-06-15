<?php
require_once __DIR__ . '/../models/Veiculo.php';
require_once __DIR__ . '/../helpers/csrf.php';

class VeiculoController {
    private $veiculo;

    public function __construct() {
        $this->veiculo = new Veiculo();
    }

    public function index() {
        $veiculos = $this->veiculo->listar();
        include __DIR__ . '/../views/veiculos/listar.php';
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verificarTokenCSRF($_POST['csrf_token'])) {
                die('Token CSRF inválido');
            }
            $this->veiculo->adicionar($_POST);
            header('Location: VeiculoController.php?action=index');
        } else {
            include __DIR__ . '/../views/veiculos/adicionar.php';
        }
    }

    public function editar() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verificarTokenCSRF($_POST['csrf_token'])) {
                die('Token CSRF inválido');
            }
            $this->veiculo->atualizar($id, $_POST);
            header('Location: VeiculoController.php?action=index');
        } else {
            $veiculo = $this->veiculo->buscar($id);
            include __DIR__ . '/../views/veiculos/editar.php';
        }
    }

    public function deletar() {
        $id = $_GET['id'];
        $this->veiculo->deletar($id);
        header('Location: VeiculoController.php?action=index');
    }
}

$controller = new VeiculoController();
$action = $_GET['action'] ?? 'index';
$controller->$action();