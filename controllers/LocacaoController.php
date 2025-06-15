<?php
require_once __DIR__ . '/../models/Locacao.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Veiculo.php';
require_once __DIR__ . '/../helpers/csrf.php';

class LocacaoController {
    private $locacao;

    public function __construct() {
        $this->locacao = new Locacao();
    }

    public function index() {
        $locacoes = $this->locacao->listar();
        include __DIR__ . '/../views/locacoes/listar.php';
    }

    public function adicionar() {
        $clientes = (new Cliente())->listar();
        $veiculos = (new Veiculo())->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verificarTokenCSRF($_POST['csrf_token'])) {
                die('Token CSRF inválido');
            }
            $this->locacao->adicionar($_POST);
            header('Location: LocacaoController.php?action=index');
        } else {
            include __DIR__ . '/../views/locacoes/adicionar.php';
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $clientes = (new Cliente())->listar();
        $veiculos = (new Veiculo())->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verificarTokenCSRF($_POST['csrf_token'])) {
                die('Token CSRF inválido');
            }
            $this->locacao->atualizar($id, $_POST);
            header('Location: LocacaoController.php?action=index');
        } else {
            $locacao = $this->locacao->buscar($id);
            include __DIR__ . '/../views/locacoes/editar.php';
        }
    }

    public function deletar() {
        $id = $_GET['id'];
        $this->locacao->deletar($id);
        header('Location: LocacaoController.php?action=index');
    }
}

$controller = new LocacaoController();
$action = $_GET['action'] ?? 'index';
$controller->$action();