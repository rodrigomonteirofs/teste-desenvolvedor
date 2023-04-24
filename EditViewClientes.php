<?php
    include 'config.php';
    
    $u = new Clientes();
    $id = $_GET['id'];
        
    $array = $u->editaClienteid($id); 

    ?>

<div class="paraEditarClientes">
    <form action="salvaClienteedit.php" method="post">
    
        <div class="camposEdit">
            <div class="conteudoCampoEdit">  
                <label for="edtNomeCliente">Nome</label>
                <input type="text" id="nome" value="<?php echo $array['nome']; ?>" name="nome" >
                <input type="text" hidden name="id" value="<?php echo $id ?>">
            </div>
            
            <div class="conteudoCampoEdit">
                <label for="edtDataNascimento">Data de nascimento</label>
                <input type="date" id="data_nascimento" value="<?php echo $array['data_nascimento']; ?>" name="data_nascimento" >
            </div>

            <div class="btnEditClientes">
            <input type="submit" value="Atualizar" name="Atualizar">
            </div>                            
        </div>
        
        <div class="fechaDialog">
            <a class="fechaModal"><i class="ph-thin ph-x-circle"></i></a>
        </div>   
                    
    </form>
</div>
    
    <script>
        // Função para fechar o modal
        $('.fechaModal').on('click', function(e) {
            e.preventDefault();        
            $('.modal_bg').hide();
        });
    </script>
        
        
    
            
                        

