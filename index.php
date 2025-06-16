<?php
session_start();
require_once 'views/templates/header.php';
require_once 'views/templates/navbar.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'sobre':
        require 'views/public/sobre.php';
        break;
    case 'servicos':
        require 'views/public/servicos.php';
        break;
    case 'contato':
        require 'views/public/contato.php';
        break;
    case 'login':
        require 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
    default:
        echo '<main class="container"><h1>Bem-vindo à Locadora de Veículos</h1><p>Escolha uma opção no menu para navegar.</p></main>';
        break;
}

require_once 'views/templates/footer.php';
