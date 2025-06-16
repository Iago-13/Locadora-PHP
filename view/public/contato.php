<?php include '../templates/header.php'; ?>
<?php include '../templates/navbar.php'; ?>

<main>
    <h2>Contato</h2>
    <p>Telefone: (41) 99999-9999</p>
    <p>Email: atendimento@locadoraveiculos.com.br</p>
    <p>Endereço: Rua das Flores, 123 - Curitiba/PR</p>

    <h3>Envie uma mensagem</h3>
    <form method="POST" action="#">
        <input type="text" name="nome" placeholder="Seu nome" required><br>
        <input type="email" name="email" placeholder="Seu email" required><br>
        <textarea name="mensagem" placeholder="Sua mensagem" required></textarea><br>
        <button type="submit">Enviar</button>
    </form>
</main>

<?php include '../templates/footer.php'; ?>
