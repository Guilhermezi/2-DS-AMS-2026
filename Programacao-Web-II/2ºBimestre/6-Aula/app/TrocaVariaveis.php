<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troca de Variáveis - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['varA'])): ?>
            <!-- Formulário ainda não enviado → exibe os campos -->

            <h1>Troca de Variáveis</h1>

            <form action="" method="post">
                <label for="varA">Digite dois valores abaixo:</label>

                <input type="number" name="varA" id="varA" placeholder="Variável A" required min="0" step="0.1">
                <input type="number" name="varB" id="varB" placeholder="Variável B" required min="0" step="0.1">

                <div class="botoes">
                    <input type="submit" value="Inverter Valores" class="botao">
                    <input type="reset"  value="Reset"            class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → realiza a troca dos valores -->

            <?php
            $varA = floatval($_POST['varA']);
            $varB = floatval($_POST['varB']);

            // Algoritmo de troca com variável temporária:
            // temp guarda o valor original de A antes de sobrescrever
            $temp = $varA;
            $varA = $varB;  // A recebe o valor de B
            $varB = $temp;  // B recebe o valor original de A
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Valores após a troca</p>

            <div class="resultado">
                <p>Variável A: <strong><?php echo $varA; ?></strong></p>
                <p>Variável B: <strong><?php echo $varB; ?></strong></p>
            </div>

            <form action="" method="get" class="form-voltar">
                <input type="submit" value="Nova Troca" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
