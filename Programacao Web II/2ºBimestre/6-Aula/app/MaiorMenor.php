<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maior e Menor - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['num1'])): ?>
            <!-- Formulário ainda não enviado → exibe os campos -->

            <h1>Maior e Menor</h1>

            <form action="" method="post">
                <label for="num1">Primeiro número:</label>
                <input type="number" name="num1" id="num1" placeholder="Primeiro Número"  required min="0" max="100" step="1">

                <label for="num2">Segundo número:</label>
                <input type="number" name="num2" id="num2" placeholder="Segundo Número" required min="0" max="100" step="1">

                <label for="num3">Terceiro número:</label>
                <input type="number" name="num3" id="num3" placeholder="Terceiro Número"  required min="0" max="100" step="1">

                <div class="botoes">
                    <input type="submit" value="Calcular Maior e Menor" class="botao">
                    <input type="reset"  value="Reset"                  class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → encontra o maior e o menor -->

            <?php
            $num1 = floatval($_POST['num1']);
            $num2 = floatval($_POST['num2']);
            $num3 = floatval($_POST['num3']);

            // max() e min() retornam o maior e o menor valor entre os argumentos
            $maior = max($num1, $num2, $num3);
            $menor = min($num1, $num2, $num3);
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Valores após o cálculo</p>

            <div class="resultado">
                <p>Número 1: <strong><?php echo $num1; ?></strong></p>
                <p>Número 2: <strong><?php echo $num2; ?></strong></p>
                <p>Número 3: <strong><?php echo $num3; ?></strong></p>
                <p>Maior:    <strong><?php echo $maior; ?></strong></p>
                <p>Menor:    <strong><?php echo $menor; ?></strong></p>
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
