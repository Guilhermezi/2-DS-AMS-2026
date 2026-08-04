<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculo salario</title>
</head>
<body>
    <?php
        $salario = $_POST['valorhora'] * $_POST['horastrabalhadas'];
        echo "O salário do funcionário é: R$ " . $salario;
    ?>
</body>
</html>