<h2>Veículos</h2>
<a href="VeiculoController.php?action=adicionar">Adicionar Veículo</a>
<table border="1">
    <tr>
        <th>ID</th><th>Marca</th><th>Modelo</th><th>Ano</th><th>Placa</th><th>Disponível</th><th>Ações</th>
    </tr>
    <?php foreach ($veiculos as $v): ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['marca'] ?></td>
            <td><?= $v['modelo'] ?></td>
            <td><?= $v['ano'] ?></td>
            <td><?= $v['placa'] ?></td>
            <td><?= $v['disponivel'] == 1 ? 'Sim' : 'Não' ?></td>
            <td>
                <a href="VeiculoController.php?action=editar&id=<?= $v['id'] ?>">Editar</a> |
                <a href="VeiculoController.php?action=deletar&id=<?= $v['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>