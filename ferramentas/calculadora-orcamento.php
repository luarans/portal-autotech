<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servico = $_POST["servico"];
    $pecas = floatval($_POST["pecas"]);
    $mao_obra = floatval($_POST["mao_obra"]);

    $total = $pecas + $mao_obra;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Orçamento</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header class="topo">
    <div class="logo">
        <h1>Auto<span>Tech</span></h1>
        <p>OFICINA MECÂNICA</p>
    </div>

    <div class="informacao">
        <h3>CALCULADORA DE ORÇAMENTO</h3>
        <p>Calcule o valor do serviço</p>
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

    <h2>Calculadora de Orçamento</h2>

    <form method="POST">

        <p>
            <label>Descrição do serviço:</label><br>
            <input type="text" name="servico" required>
        </p>

        <p>
            <label>Valor das peças:</label><br>
            <input type="number" name="pecas" step="0.01" required>
        </p>

        <p>
            <label>Valor da mão de obra:</label><br>
            <input type="number" name="mao_obra" step="0.01" required>
        </p>

        <button type="submit">Calcular</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        echo "<h2>Resumo do Orçamento</h2>";

        echo "<p>Serviço: " . $servico . "</p>";
        echo "<p>Peças: R$ " . number_format($pecas, 2, ",", ".") . "</p>";
        echo "<p>Mão de obra: R$ " . number_format($mao_obra, 2, ",", ".") . "</p>";
        echo "<p><strong>Total: R$ " . number_format($total, 2, ",", ".") . "</strong></p>";

        if ($total > 1000) {
            echo "<p>Orçamento de alto valor. Consulte as condições de pagamento.</p>";
        }
    }

    ?>

</section>

</body>
</html>