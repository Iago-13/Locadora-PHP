<?php
require_once __DIR__ . '/../config/config.php';

class Cliente {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function adicionar($dados) {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nome, email, cpf, data_nascimento, telefone) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $dados['nome'], $dados['email'], $dados['cpf'],
            $dados['data_nascimento'], $dados['telefone']
        ]);
    }

    public function atualizar($id, $dados) {
        $stmt = $this->pdo->prepare("UPDATE clientes SET nome=?, email=?, cpf=?, data_nascimento=?, telefone=? WHERE id=?");
        return $stmt->execute([
            $dados['nome'], $dados['email'], $dados['cpf'],
            $dados['data_nascimento'], $dados['telefone'], $id
        ]);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM clientes WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
