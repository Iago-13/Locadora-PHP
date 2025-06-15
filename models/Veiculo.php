<?php
require_once __DIR__ . '/../config/config.php';

class Veiculo {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM veiculos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM veiculos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function adicionar($dados) {
        $stmt = $this->pdo->prepare("INSERT INTO veiculos (marca, modelo, ano, placa, disponivel) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $dados['marca'], $dados['modelo'], $dados['ano'],
            $dados['placa'], $dados['disponivel']
        ]);
    }

    public function atualizar($id, $dados) {
        $stmt = $this->pdo->prepare("UPDATE veiculos SET marca=?, modelo=?, ano=?, placa=?, disponivel=? WHERE id=?");
        return $stmt->execute([
            $dados['marca'], $dados['modelo'], $dados['ano'],
            $dados['placa'], $dados['disponivel'], $id
        ]);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM veiculos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
