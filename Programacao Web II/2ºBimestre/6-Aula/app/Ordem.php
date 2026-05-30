<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem Decrescente dos Ímpares - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['num1'])): ?>
            <!-- Formulário ainda não enviado → exibe os campos -->

            <h1>Ímpares em Ordem Decrescente</h1>

            <form action="" method="post">
                <label for="num1">Número mínimo:</label>
                <input type="number" name="num1" id="num1" placeholder="Mínimo" required min="0" max="100" step="1">

                <label for="num2">Número máximo:</label>
                <input type="number" name="num2" id="num2" placeholder="Máximo" required min="0" max="100" step="1">

                <div class="botoes">
                    <input type="submit" value="Calcular" class="botao">
                    <input type="reset"  value="Reset"    class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → filtra os ímpares e ordena de forma decrescente -->

            <?php
            $num1 = intval($_POST['num1']);
            $num2 = intval($_POST['num2']);

            $listaImpares = [];

            // Percorre o intervalo e coleta apenas os ímpares
            for ($i = $num1; $i <= $num2; $i++) {
                if ($i % 2 !== 0) {
                    $listaImpares[] = $i;
                }
            }

            // rsort() ordena o array em ordem decrescente
            rsort($listaImpares);
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Ímpares de <?php echo $num1; ?> a <?php echo $num2; ?></p>

            <div class="resultado">
                <!-- implode() junta os itens do array em uma string separada por vírgula -->
                <p>Lista: <strong><?php echo implode(', ', $listaImpares); ?></strong></p>
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
