<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculo quadrado</title>
</head>
<body>
    <?php
        $numa = $_POST['numa'];
        $numb = $_POST['numb'];
        $soma = $numa + $numb;
        $quadrado = pow($soma, 2);
        echo "O quadrado dos números " . $numa . " e " . $numb . " é: " . $quadrado;
    ?>
</body>
</html>