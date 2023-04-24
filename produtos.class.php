<?php
class Produtos{


    public function listaProdutos(){
        global $pdo;
        $dados = array();
        $sql = $pdo->query("SELECT * FROM produtos");
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
    
        } 
        return $dados;
    }
    public function getClientesValor(){
        global $pdo;
        $dados = array();
        $sql = $pdo->query("SELECT c.id, c.nome, c.data_nascimento, COUNT(co.id) AS quantidade_compras, SUM(p.preco) AS valor_total_compras
        FROM clientes c
        INNER JOIN compras co ON c.id = co.id_cliente
        INNER JOIN produtos p ON co.id_produto = p.id
        GROUP BY c.id, c.nome, c.data_nascimento
        ORDER BY valor_total_compras DESC");
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
    
        } 
    return $dados;
    }

	public function cadProduto($nome,$preco,$descricao){
    global $pdo;
    
        
        $sql = $pdo->prepare("INSERT INTO produtos SET nome = :nome, preco = :preco, descricao = :descricao");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":preco", $preco); 
        $sql->bindValue(":descricao", $descricao);
        $sql->execute();
        header("Location: produtos.php");
	}

    public function editaProdutoid($id){
        global $pdo;
        $array = array();
        if(isset($_GET['id']) && empty($_GET['id']) == false){
        $id = addslashes($_GET['id']);    
        $sql = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
                    
        }
        return $array;
    }
    }

public function editaProdutoinsert($id){
    global $pdo;
    if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $preco = addslashes($_POST['preco']);
    $descricao = addslashes($_POST['descricao']);
    $sql= $pdo->prepare("UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":preco", $preco);
    $sql->bindValue(":descricao", $descricao);
    $sql->execute();
    header("Location: produtos.php");
    }
}

public function excluirProduto($id){
    global $pdo;
    // apaga o produto
    $sql = "SELECT COUNT(*) AS num_compras FROM compras WHERE id_produto = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['num_compras'] == 0) {
        // o produto não está relacionado a nenhuma compra, pode ser apagado
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "<script>alert('Produto deletado com Sucesso.');</script><a href='produtos.php'>Voltar</a>";
    } else {
        // o produto está relacionado a compras, não pode ser apagado
        echo "'<script>alert('O produto não pode ser apagado porque está relacionado a compras.');</script>'<br>";
        echo "O produto não pode ser apagado porque está relacionado a compras.<a href='produtos.php'>Voltar</a><br>";
    }
    // $sql = "DELETE FROM produtos WHERE id = :id";
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $id);
    // $stmt->execute();
    // echo "'<script>alert('Produto Deletado com Sucesso.');</script>'<a href='produtos.php'>Voltar</a><br>";


}

}
