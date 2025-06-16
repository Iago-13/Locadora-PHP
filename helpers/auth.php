<?php
function verificarAutenticacao() {
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../controllers/AuthController.php?action=login');
        exit;
    }
}