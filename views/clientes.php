<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../models/cliente_model.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$cliente = new Cliente($conn);
$clientes = $cliente->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes - LocVeiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Clientes</h1>

    <a href="cadastro_cliente.php" class="btn btn-success mb-3">Cadastrar Cliente</a>
    <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>

    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success">Cliente cadastrado com sucesso!</div>
    <?php elseif (isset($_GET['editado'])): ?>
        <div class="alert alert-success">Cliente editado com sucesso!</div>
    <?php elseif (isset($_GET['excluido'])): ?>
        <div class="alert alert-success">Cliente excluído com sucesso!</div>
    <?php elseif (isset($_GET['erro'])): ?>
        <div class="alert alert-danger">Ocorreu um erro!</div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= $c['nome'] ?></td>
                    <td><?= $c['cpf'] ?></td>
                    <td><?= $c['telefone'] ?></td>
                    <td><?= $c['endereco'] ?></td>
                    <td>
                        <a href="editar_cliente.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="../controllers/cliente_controller.php?excluir=<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este cliente?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
