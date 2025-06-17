<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require_once '../models/veiculo_model.php';
require_once '../db.php';

$veiculo = new Veiculo($conn);
$veiculos = $veiculo->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Veículos - LocVeiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Veículos</h2>

    <a href="veiculo_form.php" class="btn btn-primary mb-3">Cadastrar Novo Veículo</a>
    <a href="index.php" class="btn btn-secondary mb-3">Voltar à Página Inicial</a>

    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success">Veículo cadastrado com sucesso!</div>
    <?php elseif (isset($_GET['editado'])): ?>
        <div class="alert alert-success">Veículo editado com sucesso!</div>
    <?php elseif (isset($_GET['excluido'])): ?>
        <div class="alert alert-success">Veículo excluído com sucesso!</div>
    <?php elseif (isset($_GET['erro'])): ?>
        <div class="alert alert-danger">Ocorreu um erro. Tente novamente.</div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Ano</th>
                <th>Disponível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $v): ?>
                <tr>
                    <td><?= htmlspecialchars($v['id']) ?></td>
                    <td><?= htmlspecialchars($v['marca']) ?></td>
                    <td><?= htmlspecialchars($v['modelo']) ?></td>
                    <td><?= htmlspecialchars($v['placa']) ?></td>
                    <td><?= htmlspecialchars($v['ano']) ?></td>
                    <td><?= htmlspecialchars($v['disponivel']) ?></td>
                    <td>
                        <a href="veiculo_form.php?id=<?= $v['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="../controllers/veiculo_controller.php?excluir=<?= $v['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Tem certeza que deseja excluir?');">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
