<?php
include 'clientes.class.php';
include 'produtos.class.php';

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemapge";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem-sucedida";
} catch(PDOException $e) {
    echo "Falha na conexão com o banco de dados: " . $e->getMessage();
}
?>