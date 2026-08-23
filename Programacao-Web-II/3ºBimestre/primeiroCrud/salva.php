<?php
    // Incluindo o arquivo de conexão
    include 'conexao.php';

    // Recebendo os dados do formulário
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];

    // Preparando a consulta SQL para inserir os dados na tabela "aluno"
    $sql = "INSERT INTO aluno (nome, curso) VALUES (:nome, :curso)";

    // Preparando a declaração SQL
    $stmt = $conexao->prepare($sql);

    // Vinculando os parâmetros aos valores recebidos do formulário
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':curso', $curso);

    // Executando a declaração SQL
    $stmt->execute();
?>