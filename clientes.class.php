<?php
class Clientes{


    public function listaClientes(){
        global $pdo;
        $dados = array();
        $sql = $pdo->query("SELECT * FROM clientes");
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

	public function cadCliente($nome,$data_nascimento){
    global $pdo;
    
        
        $sql = $pdo->prepare("INSERT INTO clientes SET nome = :nome, data_nascimento = :data_nascimento");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":data_nascimento", $data_nascimento); 
        $sql->execute();
        header("Location: clientes.php");
	}

    public function editaClienteid($id){
        global $pdo;
        $array = array();
        if(isset($_GET['id']) && empty($_GET['id']) == false){
        $id = addslashes($_GET['id']);    
        $sql = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
                    
        }
        return $array;
    }
    }

    public function editaClienteinsert($id){
        global $pdo;
        if(isset($_POST['nome']) && !empty($_POST['nome'] && isset($id))){
            $nome = addslashes($_POST['nome']);
            $data_nascimento = addslashes($_POST['data_nascimento']);
            $sql= $pdo->prepare("UPDATE clientes SET nome = :nome, data_nascimento = :data_nascimento WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":data_nascimento", $data_nascimento);
            $sql->execute();
            //echo "<script>alert('Cliente alterado com sucesso ok.');</script><a href='clientes.php'>Voltar</a><br>";
            header("Location: clientes.php");
        }
    }

public function excluirClientes($id){
    global $pdo;

    $sql = "SELECT COUNT(*) AS num_compras FROM compras WHERE id_cliente = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['num_compras'] > 0) {
        // o cliente tem compras, então precisa apagar as compras antes de apagar o cliente
        $sql = "DELETE FROM compras WHERE id_cliente = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    // apaga o cliente
    $sql = "DELETE FROM clientes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    echo "<script>alert('Cliente Deletado com Sucesso.');</script><a href='clientes.php'>Voltar</a><br>";


}

}
