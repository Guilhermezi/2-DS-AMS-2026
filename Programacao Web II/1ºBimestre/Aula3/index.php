<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $nome = "Guilherme"; // Variável do tipo string para meu nome
        $sobrenome = "Izidio Nogueira"; // Variável do tipo string para meu sobrenome
        $idade = 17; // Variável do tipo inteiro para minha idade
        $dataNascimento = "10/12/2008"; // Variável do tipo string para minha data de nascimento


        echo "<h1>Olá, mundo!</h1>"; // Imprime um título na página
        echo "<p>Meu nome é " . $nome . "</p>"; // Imprime um parágrafo com meu nome, concatenando a variável $nome com o texto
        echo "<p>Meu sobre nome é " . $sobrenome . "</p>"; // Imprime um parágrafo com meu sobrenome, concatenando a variável $sobrenome com o texto
        echo "<p>Tenho " . $idade . " anos</p>"; // Imprime um parágrafo com minha idade, concatenando a variável $idade com o texto
        echo "<p>Minha data de nascimento é " . $dataNascimento . "</p>"; // Imprime um parágrafo com minha data de nascimento, concatenando a variável $dataNascimento com o texto
    ?>
</body>
</html>