<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="Pizza.png">
    <title>Cadastro de Sabores de Pizza</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Processar os dados enviados pelo formulário
        $nome = $_POST["nome"];
        $ingredientes = $_POST["ingredientes"];
        $preco_sem_borda = $_POST["preco_sem_borda"];
        $preco_borda_recheada = $_POST["preco_borda_recheada"];
        $doce = $_POST["doce"];

        echo "<h1>Sabor de pizza cadastrado com sucesso!</h1>";
        echo "<p>Nome: $nome</p>";
        echo "<p>Ingredientes: $ingredientes</p>";
        echo "<p>Preço sem Borda Recheada: $preco_sem_borda</p>";
        echo "<p>Preço com Borda Recheada: $preco_borda_recheada</p>";
        echo "<p>Doce: " . ($doce == 1 ? 'Sim' : 'Não') . "</p>";
    }
    ?>
    
    <h1>Cadastro de Sabores de Pizza</h1>
    <form method="POST" action="">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="ingredientes">Ingredientes:</label>
            <input type="text" id="ingredientes" name="ingredientes" required>
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
</body>
</html>
