<?php
    include '../config/Conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $vaga_id = $_POST['vaga_id'];

    $sql = "INSERT INTO candidato (nome, email, vaga_id) VALUES (:nome, :email, :vaga_id)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':vaga_id', $vaga_id, PDO::PARAM_INT);

    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição Realizada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Portal de Empregos</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5" style="max-width: 640px;">
        <div class="alert alert-success text-center">
            <h4>Candidato inscrito com sucesso!</h4>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="ListarCandidatos.php" class="btn btn-primary">Ver lista de candidatos</a>
            <a href="Inscricao.php" class="btn btn-outline-secondary">Nova inscrição</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>