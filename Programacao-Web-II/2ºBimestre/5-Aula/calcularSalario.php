<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina de calculo de Salario</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            $valor = $_POST['valor'];
            $horas = $_POST['horas'];
            $salario = $valor * $horas;
            echo "<p class='salario'>De acordo com as informações digitadas na página anterior, o salário é R$ " . $salario . "</p>";
        ?>
</body>
</html>