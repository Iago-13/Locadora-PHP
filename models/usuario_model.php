<?php
class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($email, $senha) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                unset($usuario['senha']);
                return $usuario;
            }
        }
        return false;
    }

    public function cadastrar($nome, $cpf, $email, $senha) {
        // Verifica se já existe email ou cpf
        $stmt = $this->conn->prepare("SELECT id FROM usuarios WHERE email = ? OR cpf = ?");
        $stmt->bind_param("ss", $email, $cpf);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return false;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nome, cpf, email, senha) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $cpf, $email, $senhaHash);
        return $stmt->execute();
    }
}
?>