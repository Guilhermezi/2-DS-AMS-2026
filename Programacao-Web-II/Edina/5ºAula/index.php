<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tratado</title>
</head>
<body>
   <?php
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    echo "Oi $nome. Você tem $idade anos.";
    ?>
</body>
</html>