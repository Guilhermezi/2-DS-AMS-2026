<?php
    include 'conexao.php';

    $sql = "SELECT * FROM aluno";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    echo "<link rel='stylesheet' href='style.css'>";
    echo "<h1>Lista de Alunos</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Curso</th><th>Ações</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['curso']) . "</td>";
        echo "<td><a href='editar.php?id=" . $row['id'] . "'>Editar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<p><a href='index.html'>+ Cadastrar novo aluno</a></p>";
?>