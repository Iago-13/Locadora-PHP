<?php require_once __DIR__ . '/../../helpers/csrf.php'; ?>
<h2>Login</h2>
<?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
<form method="POST">
    <input name="email" placeholder="Email" required><br>
    <input name="senha" type="password" placeholder="Senha" required><br>
    <input type="hidden" name="csrf_token" value="<?= gerarTokenCSRF(); ?>">
    <button type="submit">Entrar</button>
</form>
<p><a href="AuthController.php?action=recuperar">Esqueceu a senha?</a></p>