<?php
require_once '../db.php';
require_once '../models/veiculo_model.php';

$veiculoModel = new Veiculo($conn);
$veiculo = null;

if (isset($_GET['id'])) {
    $veiculo = $veiculoModel->buscarPorId($_GET['id']);
}?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $veiculo ? 'Editar' : 'Cadastrar' ?> Veículo - LocVeiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2><?= $veiculo ? 'Editar' : 'Cadastrar' ?> Veículo</h2>
    <form action="../controllers/veiculo_controller.php" method="POST">
        <input type="hidden" name="acao" value="<?= $veiculo ? 'editar' : 'cadastrar' ?>">
        <?php if ($veiculo): ?>
            <input type="hidden" name="id" value="<?= $veiculo['id'] ?>">
        <?php endif; ?>
        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" required value="<?= $veiculo['marca'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" required value="<?= $veiculo['modelo'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" required value="<?= $veiculo['placa'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label>Ano</label>
            <input type="number" name="ano" class="form-control" required value="<?= $veiculo['ano'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label>Disponível</label>
            <select name="disponivel" class="form-control" required>
            <option value="1" <?= (isset($veiculo['disponivel']) && $veiculo['disponivel'] == 1) ? 'selected' : '' ?>>Sim</option>
            <option value="0" <?= (isset($veiculo['disponivel']) && $veiculo['disponivel'] == 0) ? 'selected' : '' ?>>Não</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><?= $veiculo ? 'Salvar Alterações' : 'Cadastrar' ?></button>
        <a href="veiculos.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
