<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $distancia = floatval($_POST["distancia"]);
    $litros = floatval($_POST["litros"]);
    $preco = floatval($_POST["preco"]);

    $consumo = $distancia / $litros;
    $custo = $litros * $preco;
    $custo_km = $custo / $distancia;

    if ($consumo >= 12) {
        $classificacao = "Bom consumo";
    } elseif ($consumo >= 8) {
        $classificacao = "Consumo médio";
    } else {
        $classificacao = "Consumo alto";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Combustível</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header class="topo">
    <div class="logo">
        <h1>Auto<span>Tech</span></h1>
        <p>OFICINA MECÂNICA</p>
    </div>

    <div class="informacao">
        <h3>CALCULADORA DE COMBUSTÍVEL</h3>
        <p>Analise o consumo do veículo</p>
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

    <h2>Calculadora de Combustível</h2>

    <form method="POST">

        <p>
            <label>Distância percorrida (km):</label><br>
            <input type="number" name="distancia" step="0.01" required>
        </p>

        <p>
            <label>Litros consumidos:</label><br>
            <input type="number" name="litros" step="0.01" required>
        </p>

        <p>
            <label>Preço do litro:</label><br>
            <input type="number" name="preco" step="0.01" required>
        </p>

        <button type="submit">Calcular</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        echo "<h2>Resultado</h2>";

        echo "<p>Consumo: " . number_format($consumo, 2, ",", ".") . " km/L</p>";
        echo "<p>Classificação: " . $classificacao . "</p>";
        echo "<p>Custo total: R$ " . number_format($custo, 2, ",", ".") . "</p>";
        echo "<p>Custo por km: R$ " . number_format($custo_km, 2, ",", ".") . "</p>";
    }

    ?>

</section>

</body>
</html>