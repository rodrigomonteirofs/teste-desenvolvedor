<?php
include 'config.php';

$u = new Produtos();
$id = $_GET['id'];
$u->excluirProduto($id);
    ?>