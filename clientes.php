<?php
include 'header.php';
include 'config.php';
?>
<section class="conteudo">
           
    <div class="content-pages">
        <div class="titulo-pages"><h2>Gestão de Clientes</h2></div>

            <div class="filtros">
                <input id="pesquisaPorNome" type="text" name="buscaClientes" placeholder="Pesquisar por nome">
                <div id="resultados"></div>
            </div>
                
            <!-- Botão para cadastrar novos clientes -->
            <a href="AddViewClientes.php" class="modal_ajax">
                <div class="adicionaUser">
                    <i class="ph-thin ph-user-circle-plus"></i>
                    <p>Adicionar cliente</p>  
                </div>
            </a>
            <!-- Encerrando o botão -->
                
                <!-- Tabela onde lista os clientes cadastrados na base de dadods -->
                <div class="caixa-listagem">
                    <table class="table-responsiva">
                        <tr>
                            <th>Nome do cliente</th>
                            <th>Data de nascimento</th>
                            <th>Ações</th>
                        </tr>
                        <?php 
                        $u = new Clientes();
                        $dados = $u->listaClientes();
                        foreach($dados as $dado){
                            $data_nascimento = date('d-m-Y', strtotime($dado['data_nascimento']));
                        ?>
                    <tr>
                        <td><?php echo $dado['nome'] ?></td>
                        <td><?php echo $data_nascimento ?></td>
                        <td>
                            <a href="EditViewClientes.php?id=<?php echo $dado['id']?>" class="modal_ajax"><i class="ph-thin ph-note-pencil"></i></a>  | 
                            <a href="excluirCliente.php?id=<?php echo $dado['id']?>"><i class="ph-thin ph-trash"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                    </table>
                </div>
                <!-- Encerrando tabela -->
                
                <div class="modal_bg">
                    <div class="modal"></div>
                </div> 
    </div>                      
                    
</section>

<?php
include 'footer.php';
?>