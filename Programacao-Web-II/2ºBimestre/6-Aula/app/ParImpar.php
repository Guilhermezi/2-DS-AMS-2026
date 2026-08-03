<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par ou Ímpar - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['num1'])): ?>
            <!-- Formulário ainda não enviado → exibe o campo -->

            <h1>Par ou Ímpar</h1>

            <form action="" method="post">
                <label for="num1">Digite o número:</label>
                <input type="number" name="num1" id="num1" placeholder="Número" required min="0" max="100" step="1">

                <div class="botoes">
                    <input type="submit" value="Verificar" class="botao">
                    <input type="reset"  value="Reset"     class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → verifica se o número é par ou ímpar -->

            <?php
            $num1 = intval($_POST['num1']);

            // O operador % retorna o resto da divisão
            // Se o resto for 0, o número é par; caso contrário, é ímpar
            $resultado = ($num1 % 2 === 0) ? 'Par' : 'Ímpar';
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Verificação de paridade</p>

            <div class="resultado">
                <p>Número:    <strong><?php echo $num1; ?></strong></p>
                <p>Resultado: <strong><?php echo $resultado; ?></strong></p>
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
