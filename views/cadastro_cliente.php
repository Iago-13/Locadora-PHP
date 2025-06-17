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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente - LocVeiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Cadastrar Cliente</h1>

    <form action="../controllers/cliente_controller.php" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>CPF:</label>
            <input type="text" name="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Telefone:</label>
            <input type="text" name="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Endereço:</label>
            <input type="text" name="endereco" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="clientes.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
