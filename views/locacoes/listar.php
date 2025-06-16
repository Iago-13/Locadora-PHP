<h2>Locações</h2>
<a href="LocacaoController.php?action=adicionar">Nova Locação</a>
<table border="1">
    <tr>
        <th>ID</th><th>Cliente</th><th>Veículo</th><th>Início</th><th>Fim</th><th>Valor</th><th>Ações</th>
    </tr>
    <?php foreach ($locacoes as $l): ?>
        <tr>
            <td><?= $l['id'] ?></td>
            <td><?= $l['cliente'] ?></td>
            <td><?= $l['veiculo'] ?></td>
            <td><?= $l['data_inicio'] ?></td>
            <td><?= $l['data_fim'] ?></td>
            <td>R$ <?= number_format($l['valor_total'], 2, ',', '.') ?></td>
            <td>
                <a href="LocacaoController.php?action=editar&id=<?= $l['id'] ?>">Editar</a> |
                <a href="LocacaoController.php?action=deletar&id=<?= $l['id'] ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>