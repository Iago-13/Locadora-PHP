<?php
class Cliente {
    private $conn;
    private $table = "clientes";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listar() {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($sql);

        $clientes = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }
        return $clientes;
    }

    public function cadastrar($nome, $cpf, $telefone, $endereco) {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (nome, cpf, telefone, endereco) VALUES (?, ?, ?, ?)");
        if (!$stmt) return false;

        $stmt->bind_param("ssss", $nome, $cpf, $telefone, $endereco);
        return $stmt->execute();
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
        if (!$stmt) return null;

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function atualizar($id, $nome, $cpf, $telefone, $endereco) {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET nome = ?, cpf = ?, telefone = ?, endereco = ? WHERE id = ?");
        if (!$stmt) return false;

        $stmt->bind_param("ssssi", $nome, $cpf, $telefone, $endereco, $id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
        if (!$stmt) return false;

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
