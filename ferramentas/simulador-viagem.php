<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $distancia = floatval($_POST["distancia"]);
    $consumo = floatval($_POST["consumo"]);
    $preco = floatval($_POST["preco"]);
    $tipo_viagem = $_POST["tipo_viagem"];

    if ($tipo_viagem == "Ida e volta") {
        $distancia = $distancia * 2;
    }

    $litros = $distancia / $consumo;
    $custo = $litros * $preco;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Viagem</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header class="topo">
    <div class="logo">
        <h1>Auto<span>Tech</span></h1>
        <p>OFICINA MECÂNICA</p>
    </div>

    <div class="informacao">
        <h3>SIMULADOR DE VIAGEM</h3>
        <p>Calcule o custo da viagem</p>
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

    <h2>Simulador de Viagem</h2>

    <form method="POST">

        <p>
            <label>Distância da viagem (km):</label><br>
            <input type="number" name="distancia" step="0.01" required>
        </p>

        <p>
            <label>Consumo médio (km/L):</label><br>
            <input type="number" name="consumo" step="0.01" required>
        </p>

        <p>
            <label>Preço do combustível:</label><br>
            <input type="number" name="preco" step="0.01" required>
        </p>

        <p>
            <label>Tipo de viagem:</label><br>

            <select name="tipo_viagem" required>
                <option value="Somente ida">Somente ida</option>
                <option value="Ida e volta">Ida e volta</option>
            </select>
        </p>

        <button type="submit">Calcular</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        echo "<h2>Resultado da Viagem</h2>";

        echo "<p>Distância total: " . number_format($distancia, 2, ",", ".") . " km</p>";
        echo "<p>Combustível necessário: " . number_format($litros, 2, ",", ".") . " litros</p>";
        echo "<p><strong>Custo total: R$ " . number_format($custo, 2, ",", ".") . "</strong></p>";
    }

    ?>

</section>

</body>
</html>