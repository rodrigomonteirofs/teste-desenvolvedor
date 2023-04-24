<?php
    include 'config.php';
    
    $u = new Clientes();
    $id = $_POST['id'];
    $altera = $u->editaClienteinsert($id);

    ?>