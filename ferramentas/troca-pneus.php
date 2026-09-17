<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $marca = $_POST["marca"];
    $preco = floatval($_POST["preco"]);
    $quantidade = intval($_POST["quantidade"]);
    $montagem = floatval($_POST["montagem"]);
    $balanceamento = floatval($_POST["balanceamento"]);

    $valor_pneus = $preco * $quantidade;
    $valor_montagem = $montagem * $quantidade;
    $valor_balanceamento = $balanceamento * $quantidade;

    $total = $valor_pneus + $valor_montagem + $valor_balanceamento;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troca de Pneus</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header class="topo">
    <div class="logo">
        <h1>Auto<span>Tech</span></h1>
        <p>OFICINA MECÂNICA</p>
    </div>

    <div class="informacao">
        <h3>SIMULADOR DE TROCA DE PNEUS</h3>
        <p>Calcule o valor da troca</p>
    </div>
</header>

<nav class="menu">
    <a href="../index.php">⌂ Início</a>
    <a href="calculadora-orcamento.php">Orçamento</a>
    <a href="troca-pneus.php">Pneus</a>
    <a href="calculadora-combustivel.php">Combustível</a>
    <a href="avaliador-manutencao.php">Serviço</a>
    <a href="simulador-viagem.php">Viagem</a>
</nav>

<section class="ferramentas">

    <h2>Simulador de Troca de Pneus</h2>

    <form method="POST">

        <p>
            <label>Marca/modelo do pneu:</label><br>
            <input type="text" name="marca" required>
        </p>

        <p>
            <label>Preço de cada pneu:</label><br>
            <input type="number" name="preco" step="0.01" required>
        </p>

        <p>
            <label>Quantidade de pneus:</label><br>
            <input type="number" name="quantidade" min="1" required>
        </p>

        <p>
            <label>Montagem por pneu:</label><br>
            <input type="number" name="montagem" step="0.01" required>
        </p>

        <p>
            <label>Balanceamento por pneu:</label><br>
            <input type="number" name="balanceamento" step="0.01" required>
        </p>

        <button type="submit">Calcular</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        echo "<h2>Resumo da Troca</h2>";

        echo "<p>Pneu: " . $marca . "</p>";
        echo "<p>Valor dos pneus: R$ " . number_format($valor_pneus, 2, ",", ".") . "</p>";
        echo "<p>Montagem: R$ " . number_format($valor_montagem, 2, ",", ".") . "</p>";
        echo "<p>Balanceamento: R$ " . number_format($valor_balanceamento, 2, ",", ".") . "</p>";
        echo "<p><strong>Total: R$ " . number_format($total, 2, ",", ".") . "</strong></p>";
    }

    ?>

</section>

</body>
</html>