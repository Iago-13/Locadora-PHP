<?php
require_once __DIR__ . '/../config/config.php';

class Locacao {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("
            SELECT l.*, c.nome AS cliente, v.modelo AS veiculo 
            FROM locacoes l
            JOIN clientes c ON c.id = l.id_cliente
            JOIN veiculos v ON v.id = l.id_veiculo
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM locacoes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function adicionar($dados) {
        $stmt = $this->pdo->prepare("
            INSERT INTO locacoes (id_cliente, id_veiculo, data_inicio, data_fim, valor_total)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $dados['id_cliente'], $dados['id_veiculo'],
            $dados['data_inicio'], $dados['data_fim'], $dados['valor_total']
        ]);
    }

    public function atualizar($id, $dados) {
        $stmt = $this->pdo->prepare("
            UPDATE locacoes SET id_cliente=?, id_veiculo=?, data_inicio=?, data_fim=?, valor_total=?
            WHERE id=?
        ");
        return $stmt->execute([
            $dados['id_cliente'], $dados['id_veiculo'],
            $dados['data_inicio'], $dados['data_fim'], $dados['valor_total'], $id
        ]);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM locacoes WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
