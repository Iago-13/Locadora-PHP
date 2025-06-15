<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Cadastro</h2>
<form method="POST">
    <input name="nome" placeholder="Nome completo" required><br>
    <input name="email" placeholder="Email" required><br>
    <input name="senha" type="password" placeholder="Senha" required><br>
    <input name="cpf" placeholder="CPF" required><br>
    <label>Data de nascimento:</label><br>
    <input name="data_nascimento" type="date" required><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Cadastrar</button>
</form>