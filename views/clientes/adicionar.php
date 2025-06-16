<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Adicionar Cliente</h2>
<form method="POST">
    <input name="nome" placeholder="Nome" required><br>
    <input name="email" placeholder="Email" required><br>
    <input name="cpf" placeholder="CPF" required><br>
    <input name="data_nascimento" type="date" required><br>
    <input name="telefone" placeholder="Telefone" required><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Salvar</button>
</form>