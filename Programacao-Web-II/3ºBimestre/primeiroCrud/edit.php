<?php
    include 'conexao.php';
    $id = $_GET['id'] ?? null;
    if ($id === null) {
        echo "ID do aluno não fornecido.";
        exit;
    }

    $sql = "SELECT * FROM aluno WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<link rel='stylesheet' href='style.css'>";
    echo "<h1>Editar Aluno</h1>";
    echo "<form action='update.php' method='POST'>";
    echo "<input type='hidden' name='id_original' value='" . htmlspecialchars($id) . "'>";
    echo "<label for='id'>ID:</label>";
    echo "<input type='number' id='id' name='id' value='" . htmlspecialchars($id) . "' required>";
    echo "<label for='nome'>Nome:</label>";
    echo "<input type='text' id='nome' name='nome' value='" . htmlspecialchars($aluno['nome'] ?? '') . "' required>";
    echo "<label for='curso'>Curso:</label>";
    echo "<input type='text' id='curso' name='curso' value='" . htmlspecialchars($aluno['curso'] ?? '') . "' required>";
    echo "<input type='submit' value='Atualizar'>";
    echo "</form>";
    echo "<p><a href='read.php'>&larr; Voltar para a lista</a></p>";

?>