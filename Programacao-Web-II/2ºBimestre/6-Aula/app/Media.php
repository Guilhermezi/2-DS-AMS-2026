<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Notas - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['nota1'])): ?>
            <!-- Formulário ainda não enviado → exibe os campos -->

            <h1>4 Notas</h1>

            <form action="" method="post">
                <label for="nota1">Primeira nota:</label>
                <input type="number" name="nota1" id="nota1" placeholder="Nota 1" required min="0" max="10" step="0.1">

                <label for="nota2">Segunda nota:</label>
                <input type="number" name="nota2" id="nota2" placeholder="Nota 2" required min="0" max="10" step="0.1">

                <label for="nota3">Terceira nota:</label>
                <input type="number" name="nota3" id="nota3" placeholder="Nota 3" required min="0" max="10" step="0.1">

                <label for="nota4">Quarta nota:</label>
                <input type="number" name="nota4" id="nota4" placeholder="Nota 4" required min="0" max="10" step="0.1">

                <div class="botoes">
                    <input type="submit" value="Calcular Média" class="botao">
                    <input type="reset"  value="Reset"          class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → calcula a média e define a situação -->

            <?php
            $nota1 = floatval($_POST['nota1']);
            $nota2 = floatval($_POST['nota2']);
            $nota3 = floatval($_POST['nota3']);
            $nota4 = floatval($_POST['nota4']);

            // Média aritmética simples das 4 notas
            $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

            // Define a situação com base na média
            if ($media >= 6.0) {
                $situacao = 'Aprovado';
            } elseif ($media >= 3.0) {
                $situacao = 'Exame';
            } else {
                $situacao = 'Reprovado';
            }
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Valores após o cálculo</p>

            <div class="resultado">
                <p>Nota 1:   <strong><?php echo $nota1; ?></strong></p>
                <p>Nota 2:   <strong><?php echo $nota2; ?></strong></p>
                <p>Nota 3:   <strong><?php echo $nota3; ?></strong></p>
                <p>Nota 4:   <strong><?php echo $nota4; ?></strong></p>
                <p>Média:    <strong><?php echo number_format($media, 2, ',', '.'); ?></strong></p>
                <p>Situação: <strong><?php echo $situacao; ?></strong></p>
            </div>

            <form action="" method="get" class="form-voltar">
                <input type="submit" value="Nova Média" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
