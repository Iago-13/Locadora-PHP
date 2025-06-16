<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Adicionar Veículo</h2>
<form method="POST">
    <input name="marca" placeholder="Marca" required><br>
    <input name="modelo" placeholder="Modelo" required><br>
    <input name="ano" type="number" placeholder="Ano" required><br>
    <input name="placa" placeholder="Placa" required><br>
    <label>Disponível:
        <select name="disponivel">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </label><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Salvar</button>
</form>