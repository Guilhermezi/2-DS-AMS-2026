<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovação - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['nota1'])): ?>
            <!-- Formulário ainda não foi enviado → exibe os campos -->

            <h1>Notas</h1>

            <form action="" method="post">
                <label for="nota1">Digite as 4 notas abaixo:</label>

                <!-- Campos de 0 a 10, aceitando casas decimais -->
                <input type="number" name="nota1" id="nota1" placeholder="Nota 1" required min="0" max="10" step="0.1">
                <input type="number" name="nota2" id="nota2" placeholder="Nota 2" required min="0" max="10" step="0.1">
                <input type="number" name="nota3" id="nota3" placeholder="Nota 3" required min="0" max="10" step="0.1">
                <input type="number" name="nota4" id="nota4" placeholder="Nota 4" required min="0" max="10" step="0.1">

                <div class="botoes">
                    <input type="submit" value="Calcular Média" class="botao">
                    <input type="reset"  value="Reset"          class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → processa os dados e exibe o resultado -->

            <?php
            // Converte os valores recebidos do POST para decimal
            $nota1 = floatval($_POST['nota1']);
            $nota2 = floatval($_POST['nota2']);
            $nota3 = floatval($_POST['nota3']);
            $nota4 = floatval($_POST['nota4']);

            // Calcula a média aritmética simples das 4 notas
            $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Média das Notas</p>

            <div class="resultado">
                <!-- number_format: 2 casas decimais, vírgula como decimal, ponto como milhar -->
                <p>Média: <strong><?php echo number_format($media, 2, ',', '.'); ?></strong></p>

                <?php if ($media >= 6.0): ?>
                    <!-- Aprovado se a média for maior ou igual a 6 -->
                    <p class="status-aprovado">Status: Aprovado! 🎉</p>
                <?php else: ?>
                    <p class="status-reprovado">Status: Reprovado. ❌</p>
                <?php endif; ?>
            </div>

            <!-- Botão GET para limpar o POST e voltar ao formulário -->
            <form action="" method="get" class="form-voltar">
                <input type="submit" value="Nova Média" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
