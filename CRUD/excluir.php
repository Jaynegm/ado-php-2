<?php
try {
    include "abrir_transacao.php";
include_once "operacoes.php";

$chave = (int) $_POST["sabor"];
$id = excluir_sabor($sabor);

header("Location: listagem.php");

$transacaoOk = true;

} finally {
    include 
}
?>
