<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <h1>Editar Aluno</h1>
    <form action="../controllers/atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($aluno['id']) ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($aluno['nome'] ?? '') ?>" required>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" value="<?= htmlspecialchars($aluno['curso'] ?? '') ?>" required>

        <button type="submit">Atualizar</button>
    </form>
    <p><a href="../controllers/listar.php">&larr; Voltar para a lista</a></p>
</body>
</html>
