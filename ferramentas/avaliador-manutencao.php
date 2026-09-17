<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $veiculo = $_POST["veiculo"];
    $km_atual = intval($_POST["km_atual"]);
    $km_ultima = intval($_POST["km_ultima"]);

    $km_percorridos = $km_atual - $km_ultima;

    if ($veiculo == "Carro") {

        if ($km_percorridos <= 5000) {
            $situacao = "Manutenção em dia";
        } elseif ($km_percorridos <= 10000) {
            $situacao = "Manutenção recomendada";
        } else {
            $situacao = "Manutenção necessária";
        }

    } else {

        if ($km_percorridos <= 3000) {
            $situacao = "Manutenção em dia";
        } elseif ($km_percorridos <= 6000) {
            $situacao = "Manutenção recomendada";
        } else {
            $situacao = "Manutenção necessária";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliador de Manutenção</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header class="topo">
    <div class="logo">
        <h1>Auto<span>Tech</span></h1>
        <p>OFICINA MECÂNICA</p>
    </div>

    <div class="informacao">
        <h3>AVALIADOR DE MANUTENÇÃO</h3>
        <p>Verifique a situação do veículo</p>
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

    <h2>Avaliador de Manutenção</h2>

    <form method="POST">

        <p>
            <label>Tipo de veículo:</label><br>

            <select name="veiculo" required>
                <option value="Carro">Carro</option>
                <option value="Motocicleta">Motocicleta</option>
            </select>
        </p>

        <p>
            <label>Quilometragem atual:</label><br>
            <input type="number" name="km_atual" required>
        </p>

        <p>
            <label>Quilometragem da última manutenção:</label><br>
            <input type="number" name="km_ultima" required>
        </p>

        <button type="submit">Avaliar</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        echo "<h2>Resultado</h2>";

        echo "<p>Veículo: " . $veiculo . "</p>";
        echo "<p>Quilômetros percorridos: " . $km_percorridos . " km</p>";
        echo "<p><strong>" . $situacao . "</strong></p>";
    }

    ?>

</section>

</body>
</html>