<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>LocVeiculos - Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">LocVeiculos</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li class="nav-item"><a class="nav-link" href="clientes.php">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="veiculos.php">Veículos</a></li>
                    <li class="nav-item"><a class="nav-link" href="locacoes.php">Locações</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php">Sair (<?php echo $_SESSION['usuario']['nome']; ?>)</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="cadastro.php">Cadastro</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-light text-center py-5">
    <div class="container">
        <h1>Bem-vindo à LocVeiculos</h1>
        <p>Sistema de gestão de locação de veículos.</p>
    </div>
</header>

<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        &copy; 2025 LocVeiculos. Todos os direitos reservados.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
