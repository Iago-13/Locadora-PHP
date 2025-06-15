<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Nova Locação</h2>
<form method="POST">
    <label>Cliente:</label>
    <select name="id_cliente">
        <?php foreach ($clientes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Veículo:</label>
    <select name="id_veiculo">
        <?php foreach ($veiculos as $v): ?>
            <option value="<?= $v['id'] ?>"><?= $v['modelo'] ?> (<?= $v['placa'] ?>)</option>
        <?php endforeach; ?>
    </select><br>

    <label>Data Início:</label>
    <input type="date" name="data_inicio" required><br>

    <label>Data Fim:</label>
    <input type="date" name="data_fim" required><br>

    <label>Valor Total:</label>
    <input type="number" name="valor_total" step="0.01" required><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Salvar</button>
</form>