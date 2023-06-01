<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Pizza.png">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Pizzas</title>
</head>
<body>
    
<?php
    
try {
    include "abrir_transação.php";
    include_once "operações.php";

    $tipos = listar_todos_sabores();

    function validar($sabor) {
        global $tipos;
        return strlen($sabor["nome"]) <= 30
            && strlen($sabor["ingrediente"]) >= 4
            && strlen($sabor["preço sem borda"]) <= 50
            && strlen($sabor["preço com borda"]) >= 4
            && strlen($sabor["doce"]) <= 200
            && $sabor["folhas"] >= 0
            && $sabor["folhas"] <= 5000000
            && in_array($sabor["tipo"], $tipos, true);
    }


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $alterar = isset($_GET["chave"]);
        if ($alterar) {
            $chave = $_GET["chave"];
            $sabor = buscar_sabor($chave);
            if ($sabor == null) die("Não existe!");
        } else {
            $chave = "";
            $sabor = [
                "chave" => "",
                "nome" => "",
                "ingrediente" => "",
                "preço sem borda" => "",
                "preço com borda" => "",
                "doce" => ""
            ];
        }
        $validacaoOk = true;
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $alterar = isset($_POST["chave"]);
        if ($alterar) {
            $sabor = [
                "chave" => $_POST["chave"],
                "nome" => $_POST["nome"],
                "ingrediente" => $_POST["ingrediente"],
                "preço sem borda" => $_POST["preco_sem_borda"],
                "preço com borda" => $_POST["preco_borda_recheada"],
                "doce" => $_POST["doce"] ? 'Sim' : 'Não',
            ];
            $validacaoOk = validar($sabor);
            if ($validacaoOk) alterar_sabor($sabor);
        } else {
            $sabor = [
                "nome" => $_POST["nome"],
                "ingrediente" => $_POST["ingrediente"],
                "preço sem borda" => $_POST["preco_sem_borda"],
                "preço com borda" => $_POST["preco_borda_recheada"],
                "doce" => $_POST["doce"] ? 'Sim' : 'Não',
            ];
            $validacaoOk = validar($sabor);
            if ($validacaoOk) $id = inserir_sabor($sabor);
        }

        if ($validacaoOk) {
            header("Location: listar.php");
            $transacaoOk = true;
        }
    } else {
        die("Método não aceito");
    }

?>
   <fieldset>
    <h1>Cadastro de Sabores de Pizza</h1>
    <legend>
        <a href="cadastrar.php">Cadastrar</a>
        <a href="listar.php">Listar</a>
    </legend>
    <form method="POST" action="">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="ingrediente">Ingredientes:</label>
            <input type="text" id="ingrediente" name="ingrediente" required>
        </div>
        <div>
            <label for="preco_sem_borda">Preço sem Borda Recheada:</label>
            <input type="number" id="preco_sem_borda" name="preco_sem_borda" required>
        </div>
        <div>
            <label for="preco_borda_recheada">Preço com Borda Recheada:</label>
            <input type="number" id="preco_borda_recheada" name="preco_borda_recheada" required>
        </div>
        <div>
            <label for="doce">Doce:</label>
            <select id="doce" name="doce" required>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
    </fieldset>
</body>
</html>

<?php

$transacaoOk = true;

} finally {
    include "fechar_transação.php";
}
?>