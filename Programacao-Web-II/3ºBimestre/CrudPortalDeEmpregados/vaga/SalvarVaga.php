<?php
    include '../config/Conexao.php';

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $requisitos = $_POST['requisitos'];
    $salario = $_POST['salario'];

    $sql = "INSERT INTO vaga (titulo, descricao, requisitos, salario) VALUES (:titulo, :descricao, :requisitos, :salario)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':requisitos', $requisitos);
    $stmt->bindParam(':salario', $salario);

    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaga Cadastrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Portal de Empregos</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="ListarVagas.php">Listar Vagas</a></li>
                    <li class="nav-item"><a class="nav-link" href="../candidato/Inscricao.php">Inscrição</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5" style="max-width: 640px;">
        <div class="alert alert-success text-center">
            <h4>Vaga cadastrada com sucesso!</h4>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="ListarVagas.php" class="btn btn-primary">Ver lista de vagas</a>
            <a href="CadastrarVaga.php" class="btn btn-outline-secondary">Cadastrar outra</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>