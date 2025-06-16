<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../helpers/csrf.php';
session_start();

class AuthController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verificarTokenCSRF($_POST['csrf_token'])) {
                die("Acesso inválido (CSRF).");
            }
            $user = $this->usuario->autenticar($_POST['email'], $_POST['senha']);
            if ($user) {
                $_SESSION['usuario'] = $user;
                setcookie('usuario', $user['nome'], time() + 3600);
                header('Location: ../public/index.php');
            } else {
                $erro = "Credenciais inválidas.";
            }
        }
        include __DIR__ . '/../views/auth/login.php';
    }

    public function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verificarTokenCSRF($_POST['csrf_token'])) {
                die("Acesso inválido (CSRF).");
            }
            $this->usuario->cadastrar($_POST);
            header('Location: AuthController.php?action=login');
        }
        include __DIR__ . '/../views/auth/cadastro.php';
    }

    public function recuperar() {
        $novaSenha = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verificarTokenCSRF($_POST['csrf_token'])) {
                die("Acesso inválido (CSRF).");
            }
            $user = $this->usuario->buscarPorCpfData($_POST['cpf'], $_POST['data_nascimento']);
            if ($user) {
                $novaSenha = bin2hex(random_bytes(4));
                $this->usuario->atualizarSenha($user['id'], $novaSenha);
            } else {
                $erro = "Usuário não encontrado.";
            }
        }
        include __DIR__ . '/../views/auth/recuperar.php';
    }

    public function logout() {
        session_destroy();
        setcookie('usuario', '', time() - 3600);
        header('Location: ../public/index.php');
    }
}
$controller = new AuthController();
$action = $_GET['action'] ?? 'login';
$controller->$action();