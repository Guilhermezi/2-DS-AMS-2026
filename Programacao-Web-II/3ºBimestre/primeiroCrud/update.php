<?php
    include 'conexao.php';

    $id_original = $_POST['id_original'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];

    $sql = "UPDATE aluno SET id = :id, nome = :nome, curso = :curso WHERE id = :id_original";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':curso', $curso);
    $stmt->bindParam(':id_original', $id_original, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<link rel='stylesheet' href='style.css'>";
        echo "<h1>Aluno atualizado com sucesso.</h1>";
        echo "<p><a href='read.php'>Ver lista de alunos</a></p>";
    } else {
        echo "Erro ao atualizar o aluno.";
    }
?>