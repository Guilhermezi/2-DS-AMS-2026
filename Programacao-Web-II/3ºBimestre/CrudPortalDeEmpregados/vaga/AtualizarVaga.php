<?php
    include '../config/Conexao.php';

    $id_original = $_POST['id_original'];
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $requisitos = $_POST['requisitos'];
    $salario = $_POST['salario'];

    $sql = "UPDATE portal.vaga SET id = :id, titulo = :titulo, descricao = :descricao, requisitos = :requisitos, salario = :salario WHERE id = :id_original";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':requisitos', $requisitos);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':id_original', $id_original, PDO::PARAM_INT);

    $atualizado = $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaga Atualizada</title>
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
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5" style="max-width: 640px;">
        <?php if ($atualizado): ?>
            <div class="alert alert-success text-center">
                <h4>Vaga atualizada com sucesso!</h4>
            </div>
            <div class="text-center">
                <a href="ListarVagas.php" class="btn btn-primary">Ver lista de vagas</a>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                <h4>Erro ao atualizar a vaga.</h4>
            </div>
            <div class="text-center">
                <a href="ListarVagas.php" class="btn btn-secondary">Voltar para a lista</a>
            </div>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>