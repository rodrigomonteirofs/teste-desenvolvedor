<?php
include 'config.php';

$u = new Clientes();
$id = $_GET['id'];
$u->excluirClientes($id);
    ?>