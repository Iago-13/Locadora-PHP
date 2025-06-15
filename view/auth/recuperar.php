<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $nova_senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM usuarios WHERE cpf = ? AND data_nascimento = ?";
    $stmt = $banco->prepare($sql);
    $stmt->bind_param("ss", $cpf, $data_nascimento);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $update = $banco->prepare("UPDATE usuarios SET senha = ? WHERE cpf = ?");
        $update->bind_param("ss", $nova_senha, $cpf);
        $update->execute();

        echo "<p>Senha atualizada com sucesso!</p>";
    } else {
        echo "<p>Dados não conferem. Verifique CPF e Data de Nascimento.</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
</head>
<body>

    <h1>Recuperar Senha</h1>

    <form method="POST">
        <input type="text" name="cpf" placeholder="CPF" required><br><br>
        <input type="date" name="data_nascimento" required><br><br>
        <input type="password" name="nova_senha" placeholder="Nova Senha" required><br><br>
        <input type="submit" value="Atualizar Senha">
    </form>

    <a href="../index.php">Voltar</a>

</body>
</html>
