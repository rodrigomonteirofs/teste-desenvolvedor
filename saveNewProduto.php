<?php
    include 'config.php';
    
    $u = new Produtos();
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $preco = addslashes($_POST['preco']);
    $descricao = addslashes($_POST['descricao']);
    $u->cadProduto($nome,$preco,$descricao);	       
    }
    ?>