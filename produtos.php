<?php
include 'config.php';
include 'header.php';
?>
<section class="conteudo"> <!-- outras páginas devem ser inseridas aqui-->
           
            <div class="content-pages">
                <div class="titulo-pages"><h2>Lista de produtos</h2></div>

                <div class="filtros">
                <input id="pesquisaPorProduto" type="text" name="buscaClientes" placeholder="Pesquisar por produto">
                    <div id="resultados"></div>
                </div>

                <a href="cadNewProduto.php" class="modal_ajax">
                <div class="adicionaProduct" onclick="abreModal('addProduto')">
                        <i class="ph-thin ph-package"></i>
                        <p>Adicionar produto</p>
                </div>
                </a>

                <div class="caixa-listagem">
                    <table class="table-responsiva-produtos">
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                        
                        <?php                        
                            $u = new Produtos();
                            $dados = $u->listaProdutos();
                            foreach($dados as $dado){
                        ?>
                    
                        <tr>
                        <td><?php echo $dado['nome'] ?></td>
                        <td>R$ <?php echo $dado['preco'] ?></td>
                        <td><?php echo $dado['descricao'] ?></td>
                        <td>
                            <a href="EditViewProdutos.php?id=<?php echo $dado['id']?>" class="modal_ajax"><i class="ph-thin ph-note-pencil"></i></a> | 
                            <a href="excluirProduto.php?id=<?php echo $dado['id']?>"><i class="ph-thin ph-trash"></i></a>                            
                        </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>

                <div class="modal_bg">
                    <div class="modal"></div>
                </div>
        </section>

<?php
include 'footer.php';
?>