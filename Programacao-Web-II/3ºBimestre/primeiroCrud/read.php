<?php
    include 'conexao.php';

    $sql = "SELECT * FROM aluno";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    echo "<link rel='stylesheet' href='style.css'>";
    echo "<h1>Lista de Alunos</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Curso</th><th>Ações</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['curso']) . "</td>";
        echo "<td><a href='edit.php?id=" . $row['id'] . "'>Editar</a> <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este aluno?');\">Excluir</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<p><a href='create.php'>+ Cadastrar novo aluno</a></p>";
?>