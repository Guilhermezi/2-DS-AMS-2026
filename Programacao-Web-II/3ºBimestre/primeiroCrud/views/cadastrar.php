<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <form action="controllers/salvar.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required>

        <button type="submit">Cadastrar</button>
    </form>

    <button><a href="controllers/listar.php">Listar Alunos</a></button>
</body>
</html>
