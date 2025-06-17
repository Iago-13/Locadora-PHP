<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../models/cliente_model.php';
session_start();

$cliente = new Cliente($conn);

if (!isset($_SESSION['usuario'])) {
    header('Location: ../views/login.php');
    exit;
}

if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao == 'cadastrar') {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];

        if ($cliente->cadastrar($nome, $cpf, $telefone, $endereco)) {
            header('Location: ../views/clientes.php?sucesso=1');
            exit;
        } else {
            header('Location: ../views/clientes.php?erro=1');
            exit;
        }
    }

    if ($acao == 'editar') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];

        if ($cliente->atualizar($id, $nome, $cpf, $telefone, $endereco)) {
            header('Location: ../views/clientes.php?editado=1');
            exit;
        } else {
            header('Location: ../views/clientes.php?erro=1');
            exit;
        }
    }
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $cliente->excluir($id);
    header('Location: ../views/clientes.php?excluido=1');
    exit;
}
?>