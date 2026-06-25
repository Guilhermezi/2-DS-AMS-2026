<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['numero'])): ?>
            <!-- Formulário ainda não enviado → exibe o campo -->

            <h1>Tabuada</h1>

            <form action="" method="post">
                <label for="numero">Digite um número:</label>
                <input type="number" name="numero" id="numero" placeholder="Ex: 5" required min="1">

                <div class="botoes">
                    <input type="submit" value="Calcular" class="botao">
                    <input type="reset"  value="Reset"    class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → gera a tabuada do número informado -->

            <?php $numero = intval($_POST['numero']); ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Tabuada do <?php echo $numero; ?></p>

            <div class="resultado">
                <?php
                // Exibe as multiplicações de 1 a 10
                for ($i = 1; $i <= 10; $i++) {
                    $resultado = $numero * $i;
                    echo "<p>$numero × $i = <strong>$resultado</strong></p>";
                }
                ?>
            </div>

            <form action="" method="get" class="form-voltar">
                <input type="submit" value="Nova Tabuada" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
