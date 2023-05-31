<?php
function conectar() {
    try {
        $db_file ="C:\\xampp\htdocs\pizzaria.sql";
        return new PDO("sql:$db_file");
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        throw $e;
    }
}
?>
