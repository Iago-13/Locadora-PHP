<h2>Clientes</h2>
<a href="ClienteController.php?action=adicionar">Adicionar Cliente</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nome</th><th>Email</th><th>CPF</th><th>Nascimento</th><th>Telefone</th><th>Ações</th>
    </tr>
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['id'] ?></td>
            <td><?= $cliente['nome'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['cpf'] ?></td>
            <td><?= $cliente['data_nascimento'] ?></td>
            <td><?= $cliente['telefone'] ?></td>
            <td>
                <a href="ClienteController.php?action=editar&id=<?= $cliente['id'] ?>">Editar</a> |
                <a href="ClienteController.php?action=deletar&id=<?= $cliente['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>