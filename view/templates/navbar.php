<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="/public/index.php">Locadora</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/views/public/sobre.php">Sobre</a></li>
        <li class="nav-item"><a class="nav-link" href="/views/public/servicos.php">Serviços</a></li>
        <li class="nav-item"><a class="nav-link" href="/views/public/contato.php">Contato</a></li>
        <?php if (isset($_SESSION['usuario'])): ?>
          <li class="nav-item"><a class="nav-link" href="/controllers/ClienteController.php">Clientes</a></li>
          <li class="nav-item"><a class="nav-link" href="/controllers/VeiculoController.php">Veículos</a></li>
          <li class="nav-item"><a class="nav-link" href="/controllers/LocacaoController.php">Locações</a></li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['usuario'])): ?>
          <li class="nav-item"><span class="nav-link text-info">Olá, <?= $_SESSION['usuario']['nome'] ?></span></li>
          <li class="nav-item"><a class="nav-link text-danger" href="/controllers/AuthController.php?action=logout">Sair</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/controllers/AuthController.php?action=login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/controllers/AuthController.php?action=cadastro">Cadastrar</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
