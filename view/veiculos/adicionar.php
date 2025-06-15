<h2>Adicionar Veículo</h2>
<form method="POST">
    <input name="marca" placeholder="Marca" required><br>
    <input name="modelo" placeholder="Modelo" required><br>
    <input name="ano" type="number" placeholder="Ano" required><br>
    <input name="placa" placeholder="Placa" required><br>
    <label>Disponível:
        <select name="disponivel">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </label><br>
    <button type="submit">Salvar</button>
</form>