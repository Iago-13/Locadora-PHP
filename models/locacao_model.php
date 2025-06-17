<?php
require_once __DIR__ . '/../db.php';

class Locacao {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function cadastrar($cliente_id, $veiculo_id, $data_inicio, $data_fim, $valor_total) {
        $stmt = $this->conn->prepare(
            "INSERT INTO locacoes (cliente_id, veiculo_id, data_inicio, data_fim, valor_total) 
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("iissd", $cliente_id, $veiculo_id, $data_inicio, $data_fim, $valor_total);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT l.*, 
                       c.nome AS cliente_nome, 
                       v.modelo AS veiculo_modelo, 
                       v.placa AS veiculo_placa
                FROM locacoes l
                JOIN clientes c ON l.cliente_id = c.id
                JOIN veiculos v ON l.veiculo_id = v.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM locacoes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function atualizar($id, $cliente_id, $veiculo_id, $data_inicio, $data_fim, $valor_total) {
        $stmt = $this->conn->prepare(
            "UPDATE locacoes 
             SET cliente_id = ?, veiculo_id = ?, data_inicio = ?, data_fim = ?, valor_total = ? 
             WHERE id = ?"
        );
        $stmt->bind_param("iissdi", $cliente_id, $veiculo_id, $data_inicio, $data_fim, $valor_total, $id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM locacoes WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
