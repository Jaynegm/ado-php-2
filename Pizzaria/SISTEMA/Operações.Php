<?php

require_once 'conectar.php';

function listarDados() {
    $conn = conectar();

    $query = "SELECT * FROM sabor_pizza";
    $stmt = $conn->query($query);

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    desconectar($conn);

    return $dados;
}
function inserirDados($nome, $ingredientes, $precoSemBorda, $precoBordaRecheada, $doce) {
    $conn = conectar();

    $dtInclusao = time(); 

    $query = "INSERT INTO sabor_pizza (nome, ingredientes, dt_inclusao, dt_alteracao, preco_sem_borda, preco_borda_recheada, doce)
                VALUES ()";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':ingredientes', $ingredientes);
    $stmt->bindParam(':dtInclusao', $dtInclusao);
    $stmt->bindParam(':dtAlteracao', $dtInclusao); 
    $stmt->bindParam(':precoSemBorda', $precoSemBorda);
    $stmt->bindParam(':precoBordaRecheada', $precoBordaRecheada);
    $stmt->bindParam(':doce', $doce);

    $result = $stmt->execute();

    desconectar($conn);

    return $result;
}

function alterarDados($chave, $novosDados) {
    $conn = conectar();

    $dtAlteracao = time(); 

    $query = "UPDATE sabor_pizza SET nome = :nome, ingredientes = :ingredientes, dt_alteracao = :dtAlteracao, 
                preco_sem_borda = :precoSemBorda, preco_borda_recheada = :precoBordaRecheada, doce = :doce 
                WHERE chave = :chave";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nome', $novosDados['nome']);
    $stmt->bindParam(':ingredientes', $novosDados['ingredientes']);
    $stmt->bindParam(':dtAlteracao', $dtAlteracao);
    $stmt->bindParam(':precoSemBorda', $novosDados['precoSemBorda']);
    $stmt->bindParam(':precoBordaRecheada', $novosDados['precoBordaRecheada']);
?>