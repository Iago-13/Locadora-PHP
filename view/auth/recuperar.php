<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Recuperar Senha</h2>
<?php
if (isset($erro)) echo "<p style='color:red;'>$erro</p>";
if (isset($novaSenha)) echo "<p style='color:green;'>Nova senha: <strong>$novaSenha</strong></p>";
?>
<form method="POST">
    <input name="cpf" placeholder="CPF" required><br>
    <label>Data de nascimento:</label><br>
    <input name="data_nascimento" type="date" required><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Recuperar</button>
</form> 