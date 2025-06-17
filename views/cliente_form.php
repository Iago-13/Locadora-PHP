<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require_once '../controllers/cliente_controller.php';
$cliente = buscarClientePorId($_GET['id'] ?? null);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $cliente ? 'Editar' : 'Cadastrar' ?> Cliente - LocVeiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2><?= $cliente ? 'Editar' : 'Cadastrar' ?> Cliente</h2>
    <form action="../controllers/cliente_controller.php" method="POST">
        <input type="hidden" name="acao" value="<?= $cliente ? 'editar' : 'cadastrar' ?>">
        <?php if ($cliente): ?>
            <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
        <?php endif; ?>
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required value="<?= $cliente['nome'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label>CPF</label>
            <input type="text" name="cpf" class="form-control" required value="<?= $cliente['cpf'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" required value="<?= $cliente['telefone'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control" required value="<?= $cliente['endereco'] ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-success"><?= $cliente ? 'Salvar Alterações' : 'Cadastrar' ?></button>
        <a href="clientes.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
