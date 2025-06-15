<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Editar Locação</h2>
<form method="POST">
    <label>Cliente:</label>
    <select name="id_cliente">
        <?php foreach ($clientes as $c): ?>
            <option value="<?= $c['id'] ?>" <?= $c['id'] == $locacao['id_cliente'] ? 'selected' : '' ?>><?= $c['nome'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Veículo:</label>
    <select name="id_veiculo">
        <?php foreach ($veiculos as $v): ?>
            <option value="<?= $v['id'] ?>" <?= $v['id'] == $locacao['id_veiculo'] ? 'selected' : '' ?>>
                <?= $v['modelo'] ?> (<?= $v['placa'] ?>)
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Data Início:</label>
    <input type="date" name="data_inicio" value="<?= $locacao['data_inicio'] ?>" required><br>

    <label>Data Fim:</label>
    <input type="date" name="data_fim" value="<?= $locacao['data_fim'] ?>" required><br>

    <label>Valor Total:</label>
    <input type="number" name="valor_total" value="<?= $locacao['valor_total'] ?>" step="0.01" required><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Atualizar</button>
</form>