 <div class="paraAddClientes">
    <form method="post" action="salvaNewCliente.php">
        <div class="camposEdit">
            <div class="conteudoCampoEdit">  
                <label for="edtNomeCliente">Nome</label>
                <input type="text" id="nome" value="" name="nome" >
            </div>
            
            <div class="conteudoCampoEdit">
                <label for="edtDataNascimento">Data de nascimento</label>
                <input type="date" id="data_nascimento"  name="data_nascimento" >
            </div>

            <div class="btnEditClientes">
                <input type="submit"  name="Cadastrar" value="Cadastrar">
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
    
    
   
        
        
    
            
                        

