<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desconto - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['numero'])): ?>
            <!-- Formulário ainda não enviado → exibe os campos -->

            <h1>Desconto</h1>

            <form action="" method="post">
                <label for="numero">Valor do produto (R$):</label>
                <input type="number" name="numero"   id="numero"   placeholder="Ex: 500" required min="1" step="0.01">

                <label for="desconto">Percentual de desconto (%):</label>
                <input type="number" name="desconto" id="desconto" placeholder="Ex: 10"  required min="1" max="100">

                <div class="botoes">
                    <input type="submit" value="Calcular" class="botao">
                    <input type="reset"  value="Reset"    class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → calcula e exibe o resultado -->

            <?php
            // Valor original do produto
            $valor    = floatval($_POST['numero']);
            // Percentual de desconto informado pelo usuário
            $perc     = intval($_POST['desconto']);

            // Calcula quanto será descontado em reais
            $desconto   = ($valor * $perc) / 100;
            // Subtrai o desconto do valor original
            $valorFinal = $valor - $desconto;
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Desconto de <?php echo $perc; ?>%</p>

            <div class="resultado">
                <p>Valor Original:    <strong>R$ <?php echo number_format($valor,      2, ',', '.'); ?></strong></p>
                <p>Desconto aplicado: <strong>R$ <?php echo number_format($desconto,   2, ',', '.'); ?></strong></p>
                <p>Valor Final:       <strong>R$ <?php echo number_format($valorFinal, 2, ',', '.'); ?></strong></p>
            </div>

            <form action="" method="get" class="form-voltar">
                <input type="submit" value="Novo Desconto" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
