<?php
require_once __DIR__ . '/../db.php';

class Veiculo {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listar() {
        $sql = "SELECT * FROM veiculos";
        $result = mysqli_query($this->conn, $sql);

        $veiculos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $veiculos[] = $row;
        }
        return $veiculos;
    }

    public function listarDisponiveisOuSelecionado($veiculo_id = null) {
        $sql = "SELECT * FROM veiculos WHERE disponivel = 1";

        if ($veiculo_id) {
            $sql .= " OR id = " . intval($veiculo_id);
        }

        $result = mysqli_query($this->conn, $sql);

        $veiculos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $veiculos[] = $row;
        }
        return $veiculos;
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM veiculos WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function cadastrar($marca, $modelo, $placa, $ano, $disponivel) {
        $sql = "INSERT INTO veiculos (marca, modelo, placa, ano, disponivel) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssii', $marca, $modelo, $placa, $ano, $disponivel);
        return mysqli_stmt_execute($stmt);
    }

    public function atualizar($id, $marca, $modelo, $placa, $ano, $disponivel) {
        $sql = "UPDATE veiculos SET marca = ?, modelo = ?, placa = ?, ano = ?, disponivel = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssiii', $marca, $modelo, $placa, $ano, $disponivel, $id);
        return mysqli_stmt_execute($stmt);
    }

    public function excluir($id) {
        $sql = "DELETE FROM veiculos WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return mysqli_stmt_execute($stmt);
    }
}
?>
