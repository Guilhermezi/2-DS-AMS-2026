<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora - Exercícios PHP</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['num1'])): ?>
            <!-- Formulário ainda não enviado → exibe os campos -->

            <h1>Calculadora</h1>

            <form action="" method="post">
                <label for="num1">Primeiro número:</label>
                <input type="number" name="num1" id="num1" placeholder="Número 1" required min="0" max="100" step="1">

                <label for="num2">Segundo número:</label>
                <input type="number" name="num2" id="num2" placeholder="Número 2" required min="0" max="100" step="1">

                <div class="campo">
                <label for="operacao">Operação:</label>
                    <select name="operacao" id="operacao" required>
                        <option value="">-- Selecionar Operação --</option>
                        <option value="soma">Soma (+)</option>
                        <option value="subtracao">Subtração (-)</option>
                        <option value="multiplicacao">Multiplicação (×)</option>
                        <option value="divisao">Divisão (÷)</option>
                        <option value="exponenciacao">Exponenciação (^)</option>
                        <option value="raiz">Raiz Quadrada (√num1)</option>
                    </select>
                </div>

                <div class="botoes">
                    <input type="submit" value="Calcular" class="botao">
                    <input type="reset"  value="Reset"    class="botao reset">
                </div>
            </form>

        <?php else: ?>
            <!-- Formulário enviado → calcula e exibe o resultado -->

            <?php
            $num1     = floatval($_POST['num1']);
            $num2     = floatval($_POST['num2']);
            $operacao = $_POST['operacao'];
            $resultado = 0;

            switch ($operacao) {
                case 'soma':
                    $resultado = $num1 + $num2;
                    break;
                case 'subtracao':
                    $resultado = $num1 - $num2;
                    break;
                case 'multiplicacao':
                    $resultado = $num1 * $num2;
                    break;
                case 'divisao':
                    // Evita divisão por zero
                    $resultado = ($num2 != 0) ? $num1 / $num2 : 'Erro: divisão por zero';
                    break;
                case 'exponenciacao':
                    $resultado = pow($num1, $num2);
                    break;
                case 'raiz':
                    // Calcula a raiz quadrada apenas do num1
                    $resultado = sqrt($num1);
                    break;
            }
            ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Valores após o cálculo</p>

            <div class="resultado">
                <p>Número 1: <strong><?php echo $num1; ?></strong></p>
                <p>Número 2: <strong><?php echo $num2; ?></strong></p>
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
