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

            <h1>Tabuada</h1>

            <form action="" method="post">
                <p><label for="numero">Digite um número</label></p>
                
                <input 
                    type="number"
                    name="numero"
                    id="numero"
                    placeholder="Ex: 5"
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

            <?php $numero = intval($_POST['numero']); ?>

            <h1>Resultado</h1>
            <p class="subtitulo">Tabuada do <?php echo $numero; ?></p>

            <div class="resultado">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    $resultado = $numero * $i;
                    echo "<p>$numero x $i = <strong>$resultado</strong></p>";
                }
                ?>
            </div>

            <form action="" method="get" style="margin-top: 20px;">
                <input type="submit" value="Nova Tabuada" class="botao">
            </form>

        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>