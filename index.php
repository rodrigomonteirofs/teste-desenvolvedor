<?php
include 'header.php';
include 'config.php';
?>
<section class="conteudo"> <!-- outras páginas devem ser inseridas aqui-->

        
        <div class="content-pages">
            <div class="titulo-pages"><h2>Clientes que mais compraram</h2></div>

            <div class="filtros">
                <input id="recebeMes" type="text" name="categoria" placeholder="Selecione o mês" onfocus="dropdown(0)" onblur="dropdown(1)"/>
                
                <div class="dropDown">
                    <div class="listDropDown">
                        <div class="item" id="item-1" onmousedown="pegaMes(1)">Janeiro</div>
                        <div class="item" id="item-2" onmousedown="pegaMes(2)">Fevereiro</div>
                        <div class="item" id="item-3" onmousedown="pegaMes(3)">Março</div>
                        <div class="item" id="item-4" onmousedown="pegaMes(4)">Abril</div>
                        <div class="item" id="item-5" onmousedown="pegaMes(5)">Maio</div>
                        <div class="item" id="item-6" onmousedown="pegaMes(6)">Junho</div>
                        <div class="item" id="item-7" onmousedown="pegaMes(7)">Julho</div>
                        <div class="item" id="item-8" onmousedown="pegaMes(8)">Agosto</div>
                        <div class="item" id="item-9" onmousedown="pegaMes(9)">Setembro</div>
                        <div class="item" id="item-10" onmousedown="pegaMes(10)">Outubro</div>
                        <div class="item" id="item-11" onmousedown="pegaMes(11)">Novembro</div>
                        <div class="item" id="item-12" onmousedown="pegaMes(12)">Dezembro</div>
                    </div>
                </div>

            </div>

            <div class="caixa-listagem">
                <table class="table-responsiva">
                    <tr>
                        <th>Clientes</th>
                        <th>Quantidade de compras no mês</th>
                        <th>Total em reais</th>
                    </tr>
                    <?php                     

                    $u = new Clientes();
                    $dados = $u->getClientesValor();
                    foreach($dados as $dado){    
                    ?>
                    <tr>
                        <td><?php echo $dado['nome'] ?></td>
                        <td><?php echo $dado['quantidade_compras'] ?></td>
                        <td><?php echo $dado['valor_total_compras'] ?></td>
                    </tr>
                    <?php }?>
                   </table>
               </div>
               
           </div>

       </section>

<?php
include 'footer.php';
?>





       