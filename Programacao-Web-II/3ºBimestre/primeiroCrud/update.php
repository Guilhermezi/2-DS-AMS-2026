<?php
    include 'conexao.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];

    $sql = "UPDATE aluno SET nome = :nome, curso = :curso WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':curso', $curso);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<link rel='stylesheet' href='style.css'>";
        echo "<h1>Aluno atualizado com sucesso.</h1>";
        echo "<p><a href='read.php'>Ver lista de alunos</a></p>";
    } else {
        echo "Erro ao atualizar o aluno.";
    }
?>