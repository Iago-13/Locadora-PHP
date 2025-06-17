<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../models/usuario_model.php';
session_start();

$usuario = new Usuario($conn);

if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao == 'login') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = $usuario->login($email, $senha);
        if ($user) {
            $_SESSION['usuario'] = $user;
            header('Location: ../views/index.php');
            exit;
        } else {
            header('Location: ../views/login.php?erro=1');
            exit;
        }
    }

    if ($acao == 'cadastrar') {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($usuario->cadastrar($nome, $cpf, $email, $senha)) {
            header('Location: ../views/login.php?sucesso=1');
            exit;
        } else {
            header('Location: ../views/cadastro.php?erro=1');
            exit;
        }
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../views/index.php');
    exit;
}
?>
