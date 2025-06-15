<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, cpf, data_nascimento, email, usuario, senha)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $banco->prepare($sql);
    $stmt->bind_param("ssssss", $nome, $cpf, $data_nasc, $email, $usuario, $senha);

    if ($stmt->execute()) {
        echo "<p>Usuário cadastrado com sucesso!</p>";
        header("Refresh: 2; url=login.php");
    } else {
        echo "<p>Erro ao cadastrar: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>

    <h1>Cadastro de Usuário</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required><br><br>
        <input type="text" name="cpf" placeholder="CPF" required><br><br>
        <input type="date" name="data_nascimento" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="usuario" placeholder="Usuário" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>

    <a href="../index.php">Voltar</a>

</body>
</html>
