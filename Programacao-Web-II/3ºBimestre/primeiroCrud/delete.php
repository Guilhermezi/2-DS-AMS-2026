<?php
    include 'conexao.php';
    $id = $_GET['id'] ?? null;
    if ($id === null) {
        echo "ID do aluno não fornecido.";
        exit;
    }

    $sql = "DELETE FROM aluno WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header("Location: read.php");
        exit;
    } else {
        echo "<link rel='stylesheet' href='style.css'>";
        echo "<h1>Erro ao excluir o aluno.</h1>";
        echo "<p><a href='read.php'>Voltar para a lista</a></p>";
    }

?>