<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../models/locacao_model.php';
session_start();

$locacao = new Locacao($conn);

if (!isset($_SESSION['usuario'])) {
    header('Location: ../views/login.php');
    exit;
}

if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao == 'cadastrar') {
        $cliente_id = $_POST['cliente_id'];
        $veiculo_id = $_POST['veiculo_id'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $valor_total = $_POST['valor_total'];

        if ($locacao->cadastrar($cliente_id, $veiculo_id, $data_inicio, $data_fim, $valor_total)) {
            header('Location: ../views/locacoes.php?sucesso=1');
            exit;
        } else {
            header('Location: ../views/locacoes.php?erro=1');
            exit;
        }
    }

    if ($acao == 'editar') {
        $id = $_POST['id'];
        $cliente_id = $_POST['cliente_id'];
        $veiculo_id = $_POST['veiculo_id'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $valor_total = $_POST['valor_total'];

        if ($locacao->atualizar($id, $cliente_id, $veiculo_id, $data_inicio, $data_fim, $valor_total)) {
            header('Location: ../views/locacoes.php?editado=1');
            exit;
        } else {
            header('Location: ../views/locacoes.php?erro=1');
            exit;
        }
    }
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $locacao->excluir($id);
    header('Location: ../views/locacoes.php?excluido=1');
    exit;
}
?>
