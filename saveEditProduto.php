<?php
    include 'config.php';
    
    $u = new Produtos();
    $id = $_POST['id'];
    $altera = $u->editaProdutoinsert($id);
    ?>