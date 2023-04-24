<?php
include 'header.php';
?>
<section class="conteudo"> <!-- outras páginas devem ser inseridas aqui-->
           
            <div class="content-pages">
                <div class="titulo-pages"><h2>Lista de vendas</h2></div>

                <div class="filtros">
                    <input type="text" name="buscaClientes" placeholder="Pesquisar por comprador">
                </div>

                <div class="caixa-listagem">
                    <table class="table-responsiva-compras">
                        <tr>
                            <th>Data da compra</th>
                            <th>Cliente</th>
                            <th>Produto</th>
                            <th>Nota fiscal</th>
                        </tr>
                        <?php
                        // Conexão com o banco de dados
                        include 'config.php';

                        // Consulta para listar os produtos e seus compradores
                        $sql = "SELECT p.nome AS produto, p.descricao AS descricao, c.nome AS comprador, co.data_compra AS data_compra
                        FROM compras co
                        INNER JOIN clientes c ON co.id_cliente = c.id
                        INNER JOIN produtos p ON co.id_produto = p.id
                        ORDER BY p.nome";
                

                        // Executa a consulta
                        $stmt = $pdo->query($sql);

                        // Exibe os resultados usando o foreach
                        
                        foreach ($stmt as $row) {                    
                        ?>
                        <tr>
                            <td><?php echo date('d-m-Y', strtotime($row['data_compra']));?></td>
                            <td><?php echo $row['comprador'];?></td>
                            <td><?php echo $row['produto'];?></td>
                            <td>
                            <label for="file-upload"><i class="ph-thin ph-file-arrow-up"></i></label>
                            <input id="file-upload" type="file" name="file-upload" style="display:none">
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                
            </div>

        </section>

<?php
include 'footer.php';
?>