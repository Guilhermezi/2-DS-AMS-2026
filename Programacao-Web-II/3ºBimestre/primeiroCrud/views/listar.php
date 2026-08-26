<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <h1>Lista de Alunos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($alunos as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td><?= htmlspecialchars($row['curso']) ?></td>
            <td>
                <a href="../controllers/editar.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="../controllers/excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este aluno?');">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="../index.php">+ Cadastrar novo aluno</a></p>
</body>
</html>
