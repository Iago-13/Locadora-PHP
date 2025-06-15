<h2>Editar Cliente</h2>
<form method="POST">
    <input name="nome" value="<?= $cliente['nome'] ?>" required><br>
    <input name="email" value="<?= $cliente['email'] ?>" required><br>
    <input name="cpf" value="<?= $cliente['cpf'] ?>" required><br>
    <input name="data_nascimento" type="date" value="<?= $cliente['data_nascimento'] ?>" required><br>
    <input name="telefone" value="<?= $cliente['telefone'] ?>" required><br>
    <button type="submit">Atualizar</button>
</form>