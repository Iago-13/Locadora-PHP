<?php
session_start();
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $banco->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_object();

        if (password_verify($senha, $user->senha)) {
            $_SESSION['usuario'] = $user->usuario;
            $_SESSION['id-usuario'] = $user->id;

            setcookie("usuario_logado", $user->usuario, time() + (86400 * 30), "/"); // Cookie por 30 dias

            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p>Senha incorreta.</p>";
        }
    } else {
        echo "<p>Usuário não encontrado.</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <input type="submit" value="Entrar">
    </form>

    <p><a href="recuperar_senha.php">Esqueceu a senha?</a></p>
    <a href="../index.php">Voltar</a>

</body>
</html>
