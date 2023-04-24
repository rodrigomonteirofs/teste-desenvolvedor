<?php
$pdo = new PDO('mysql:host=localhost;dbname=sistemapge', 'root', '');

if(isset($_GET['nome'])){
    $term = $_GET['nome'];
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE nome LIKE ?");
    $stmt->execute(array("%$term%"));
    
    $results = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $results[] = array(
            'value' => $row['id'],
            'label' => $row['nome']
        );
    }
    
    echo json_encode($results);
}else{
    if ($_GET['produtos'] == true) {
        # code...
    
    $term = $_GET['produtos'];
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE nome LIKE ?");
    $stmt->execute(array("%$term%"));
    
    $results = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $results[] = array(
            'value' => $row['id'],
            'label' => $row['nome']
        );
    }
    
    echo json_encode($results);
}
}
?>