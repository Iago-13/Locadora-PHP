<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require_once '../db.php';
require_once '../models/locacao_model.php';
require_once '../models/cliente_model.php';
require_once '../models/veiculo_model.php';

// Instâncias dos models
$locacaoModel = new Locacao($conn);
$clienteModel = new Cliente($conn);
$veiculoModel = new Veiculo($conn);

// Busca dados
$locacao = null;
if (isset($_GET['id'])) {
    $locacao = $locacaoModel->buscarPorId($_GET['id']);
}

$clientes = $clienteModel->listar();
$veiculos = $veiculoModel->listarDisponiveisOuSelecionado($locacao['veiculo_id'] ?? null);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $locacao ? 'Editar' : 'Cadastrar' ?> Locação - LocVeiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2><?= $locacao ? 'Editar' : 'Cadastrar' ?> Locação</h2>
    <form action="../controllers/locacao_controller.php" method="POST">
        <input type="hidden" name="acao" value="<?= $locacao ? 'editar' : 'cadastrar' ?>">
        <?php if ($locacao): ?>
            <input type="hidden" name="id" value="<?= $locacao['id'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label>Cliente</label>
            <select name="cliente_id" class="form-control" required>
                <option value="">Selecione</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= $cliente['id'] ?>" <?= (isset($locacao['cliente_id']) && $locacao['cliente_id'] == $cliente['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cliente['nome']) ?> (<?= htmlspecialchars($cliente['cpf']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Veículo</label>
            <select name="veiculo_id" class="form-control" required>
                <option value="">Selecione</option>
                <?php foreach ($veiculos as $veiculo): ?>
                    <option value="<?= $veiculo['id'] ?>" <?= (isset($locacao['veiculo_id']) && $locacao['veiculo_id'] == $veiculo['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($veiculo['modelo']) ?> - <?= htmlspecialchars($veiculo['placa']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Data de Início</label>
            <input type="date" name="data_inicio" class="form-control" required value="<?= $locacao['data_inicio'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Data de Fim</label>
            <input type="date" name="data_fim" class="form-control" required value="<?= $locacao['data_fim'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Valor Total</label>
            <input type="number" step="0.01" name="valor_total" class="form-control" required value="<?= $locacao['valor_total'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-success"><?= $locacao ? 'Salvar Alterações' : 'Cadastrar' ?></button>
        <a href="locacoes.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
