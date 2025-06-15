<?php
require_once __DIR__ . '/../config/config.php';

class Usuario {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function cadastrar($dados) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento) VALUES (?, ?, ?, ?, ?)");
        $hash = password_hash($dados['senha'], PASSWORD_DEFAULT);
        return $stmt->execute([
            $dados['nome'], $dados['email'], $hash, $dados['cpf'], $dados['data_nascimento']
        ]);
    }

    public function autenticar($email, $senha) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    public function buscarPorCpfData($cpf, $data_nasc) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE cpf = ? AND data_nascimento = ?");
        $stmt->execute([$cpf, $data_nasc]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarSenha($id, $novaSenha) {
        $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
        return $stmt->execute([$hash, $id]);
    }
}
