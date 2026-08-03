<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma dos Quadrados - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['numA'])): ?>
            <!-- Formulário ainda não enviado → exibe os campos -->

            <h1>Soma dos Quadrados</h1>

            <form action="" method="post">
                <label for="numA">Digite três números abaixo:</label>

                <input type="number" name="numA" id="numA" placeholder="Número 1" required min="0" step="0.1">
                <input type="number" name="numB" id="numB" placeholder="Número 2" required min="0" step="0.1">
                <input type="number" name="numC" id="numC" placeholder="Número 3" required min="0" step="0.1">

                <div class="botoes">
                    <input type="submit" value="Calcular Soma dos Quadrados" class="botao">
                    <input type="reset"  value="Reset"                       class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → calcula e exibe o resultado -->

            <?php
            $numA = floatval($_POST['numA']);
            $numB = floatval($_POST['numB']);
            $numC = floatval($_POST['numC']);

            // pow(base, expoente) → eleva ao quadrado cada número
            $quadradoA = pow($numA, 2);
            $quadradoB = pow($numB, 2);
            $quadradoC = pow($numC, 2);

            // Soma os três quadrados
            $somaQuadrados = $quadradoA + $quadradoB + $quadradoC;
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Valores após o cálculo</p>

            <div class="resultado">
                <p>Quadrado do Número 1: <strong><?php echo $quadradoA; ?></strong></p>
                <p>Quadrado do Número 2: <strong><?php echo $quadradoB; ?></strong></p>
                <p>Quadrado do Número 3: <strong><?php echo $quadradoC; ?></strong></p>
                <p>Soma dos Quadrados:   <strong><?php echo $somaQuadrados; ?></strong></p>
            </div>

            <form action="" method="get" class="form-voltar">
                <input type="submit" value="Novo Cálculo" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
