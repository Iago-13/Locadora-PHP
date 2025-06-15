<?php
$host = 'localhost';
$db = 'locadora';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=Twitterclone;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
?>
