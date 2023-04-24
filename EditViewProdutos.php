<?php
    include 'config.php';
    
    $u = new Produtos();
    $id = $_GET['id'];
    $array = $u->editaProdutoid($id);
    //$altera = $u->editaProdutoinsert($id);
    ?>
<div class="paraAddClientes">
<form method="post" action="saveEditProduto.php">
<div class="camposEdit">
        <div class="conteudoCampoEdit">  
            <label for="edtNomeCliente">Nome</label>
            <input type="text" id="nome" value="<?php echo $array['nome']; ?>" name="nome" required>
            
        </div>
        
        <div class="conteudoCampoEdit">
            <label for="preco">Preço</label>
            <input type="text" id="preco" value="<?php echo $array['preco']; ?>"  name="preco" >
        </div>
        <div class="conteudoCampoEdit">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" value="<?php echo $array['descricao']; ?>"  name="descricao" >
            <input type="text" hidden name="id" value="<?php echo $array['id']; ?>">
        </div>

        <div class="btnEditClientes">
        <input type="submit"  name="Atualizar" value="Atualizar">
        </div>                            
    </div>
    <div class="fechaDialog">
        <a class="fechaModal"><i class="ph-thin ph-x-circle" ></i></a> 
    </div> 
</form>
</div>

<script>

// Função para fechar o modal
$('.fechaModal').on('click', function(e) {
    e.preventDefault();
    //let modal = document.querySelector(".modal_bg");
    //modal.close();
    $('.modal_bg').hide();
});


    </script>