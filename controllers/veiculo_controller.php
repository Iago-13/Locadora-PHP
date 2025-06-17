<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../models/veiculo_model.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../views/login.php');
    exit;
}

$veiculo = new Veiculo($conn);

// Cadastrar ou editar
if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao == 'cadastrar') {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $ano = $_POST['ano'];
        $disponivel = $_POST['disponivel'];

        if ($veiculo->cadastrar($marca, $modelo, $placa, $ano, $disponivel)) {
            header('Location: ../views/veiculos.php?sucesso=1');
        } else {
            header('Location: ../views/veiculos.php?erro=1');
        }
        exit;
    }

    if ($acao == 'editar') {
        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $ano = $_POST['ano'];
        $disponivel = $_POST['disponivel'];

        if ($veiculo->atualizar($id, $marca, $modelo, $placa, $ano, $disponivel)) {
            header('Location: ../views/veiculos.php?editado=1');
        } else {
            header('Location: ../views/veiculos.php?erro=1');
        }
        exit;
    }
}

// Excluir
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    if ($veiculo->excluir($id)) {
        header('Location: ../views/veiculos.php?excluido=1');
    } else {
        header('Location: ../views/veiculos.php?erro=1');
    }
    exit;
}

// Buscar veículo por ID (para edição)
function buscarVeiculoPorId($id) {
    global $conn;
    $veiculo = new Veiculo($conn);
    return $veiculo->buscarPorId($id);
}
?>
