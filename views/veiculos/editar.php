<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Editar Veículo</h2>
<form method="POST">
    <input name="marca" value="<?= $veiculo['marca'] ?>" required><br>
    <input name="modelo" value="<?= $veiculo['modelo'] ?>" required><br>
    <input name="ano" type="number" value="<?= $veiculo['ano'] ?>" required><br>
    <input name="placa" value="<?= $veiculo['placa'] ?>" required><br>
    <label>Disponível:
        <select name="disponivel">
            <option value="1" <?= $veiculo['disponivel'] == 1 ? 'selected' : '' ?>>Sim</option>
            <option value="0" <?= $veiculo['disponivel'] == 0 ? 'selected' : '' ?>>Não</option>
        </select>
    </label><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Atualizar</button>
</form>