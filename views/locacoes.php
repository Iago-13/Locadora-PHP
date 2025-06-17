<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require_once '../db.php';
require_once '../models/locacao_model.php';

$locacao = new Locacao($conn);
$locacoes = $locacao->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Locações - LocVeiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Locações</h2>

    
    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success">Locação cadastrada com sucesso!</div>
    <?php endif; ?>
    <?php if (isset($_GET['editado'])): ?>
        <div class="alert alert-success">Locação editada com sucesso!</div>
    <?php endif; ?>
    <?php if (isset($_GET['excluido'])): ?>
        <div class="alert alert-success">Locação excluída com sucesso!</div>
    <?php endif; ?>
    <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-danger">Ocorreu um erro. Tente novamente.</div>
    <?php endif; ?>

    <a href="locacao_form.php" class="btn btn-success mb-3">Nova Locação</a>
    <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Valor Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($locacoes)): ?>
                <?php foreach ($locacoes as $locacao): ?>
                    <tr>
                        <td><?= htmlspecialchars($locacao['cliente_nome']) ?></td>
                        <td><?= htmlspecialchars($locacao['veiculo_modelo']) ?> - <?= htmlspecialchars($locacao['veiculo_placa']) ?></td>
                        <td><?= htmlspecialchars($locacao['data_inicio']) ?></td>
                        <td><?= htmlspecialchars($locacao['data_fim']) ?></td>
                        <td>R$ <?= number_format($locacao['valor_total'], 2, ',', '.') ?></td>
                        <td>
                            <a href="locacao_form.php?id=<?= $locacao['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="../controllers/locacao_controller.php?excluir=<?= $locacao['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir esta locação?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhuma locação encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
