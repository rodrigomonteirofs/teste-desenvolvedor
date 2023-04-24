<?php
    include 'config.php';
    
    $u = new Clientes();
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $data_nascimento = addslashes($_POST['data_nascimento']);
    $u->cadCliente($nome,$data_nascimento);	       
    }
    ?>