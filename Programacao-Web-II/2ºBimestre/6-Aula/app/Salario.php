<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salário - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['salario'])): ?>
            <!-- Formulário ainda não enviado → exibe o campo -->

            <h1>Salário</h1>

            <form action="" method="post">
                <label for="salario">Salário bruto (R$):</label>
                <input type="number" name="salario" id="salario" placeholder="Ex: 3000,00" required min="0" step="0.01">

                <div class="botoes">
                    <input type="submit" value="Calcular Salário" class="botao">
                    <input type="reset"  value="Reset"            class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → calcula aumento, imposto e salário líquido -->

            <?php
            $salario = floatval($_POST['salario']);

            $aumento = $salario * 0.10; // 10% de aumento
            $imposto = $salario * 0.20; // 20% de imposto

            // Fórmula: salário + aumento - imposto
            $salarioLiquido = $salario + $aumento - $imposto;
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Valores após o cálculo</p>

            <div class="resultado">
                <p>Salário Inicial: <strong>R$ <?php echo number_format($salario,        2, ',', '.'); ?></strong></p>
                <p>Aumento (10%):   <strong>R$ <?php echo number_format($aumento,        2, ',', '.'); ?></strong></p>
                <p>Imposto (20%):   <strong>R$ <?php echo number_format($imposto,        2, ',', '.'); ?></strong></p>
                <p>Fórmula aplicada: [Salário + Aumento - Imposto]</p>
                <p>Salário Líquido: <strong>R$ <?php echo number_format($salarioLiquido, 2, ',', '.'); ?></strong></p>
            </div>

            <form action="" method="get" class="form-voltar">
                <input type="submit" value="Novo Salário" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
