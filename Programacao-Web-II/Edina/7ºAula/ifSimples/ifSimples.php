<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soma maior que 10</title>
</head>
<body>
    <?php
        $valora = $_POST['valora'];
        $valorb = $_POST['valorb'];
        $soma = $valora + $valorb;
        echo "A soma dos valores é: " . $soma . "<br>";
        if ($soma > 10) {
            echo "Soma maior que dez";
        }
    ?>
</body>
</html>
