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

<?php
// Configuração de conexão com o banco (Docker)
$host = 'db';
$user = 'root';
$pass = '1234';
$db = 'meubanco';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>

<main class="container">
    <div class="home-box">

        <?php if (!isset($_POST['numero'])): ?>

            <h1>Desconto</h1>

            <form action="" method="post">
                <p><label for="numero">Digite O valor</label></p>
                
                <input 
                    type="number"
                    name="numero"
                    id="numero"
                    placeholder="Ex: 500"
                    required
                    min="1"
                    style="padding: 10px; width: 100%; max-width: 300px; border-radius: 8px; border: 1px solid #ccc; margin-top: 10px;"
                >

                <input 
                    type="number"
                    name="desconto"
                    id="desconto"
                    placeholder="Ex: 10%"
                    required
                    min="1"
                    style="padding: 10px; width: 100%; max-width: 300px; border-radius: 8px; border: 1px solid #ccc; margin-top: 10px;"
                >

                <div class="botoes">
                    <input type="submit" value="Calcular" class="botao">
                    <input type="reset" value="Reset" class="botao reset">
                </div>
            </form>

        <?php else: ?>

            <?php $numero = intval($_POST['desconto']); ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Desconto de <?php echo $numero; ?>%</p>

            <div class="resultado">
                <?php
                $valor = floatval($_POST['numero']);
                $desconto = ($valor * $numero) / 100;
                $valorFinal = $valor - $desconto;
                echo "<p>Valor Original: <strong>R$ " . number_format($valor, 2, ',', '.') . "</strong></p>";
                echo "<p> Valor Com Desconto: <strong>R$ " . number_format($valorFinal, 2, ',', '.') . "</strong></p>";
                ?>
            </div>

            <form action="" method="get" style="margin-top: 20px;">
                <input type="submit" value="Novo Desconto" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>