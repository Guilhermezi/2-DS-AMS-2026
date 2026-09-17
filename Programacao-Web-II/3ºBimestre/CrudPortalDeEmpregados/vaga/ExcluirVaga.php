<?php
    include '../config/Conexao.php';
    $id = $_GET['id'] ?? null;
    if ($id === null) {
        echo "ID da vaga não fornecido.";
        exit;
    }

    $sqlCandidatos = "SELECT COUNT(*) AS total FROM candidato WHERE vaga_id = :vaga_id";
    $stmtCandidatos = $conexao->prepare($sqlCandidatos);
    $stmtCandidatos->bindParam(':vaga_id', $id, PDO::PARAM_INT);
    $stmtCandidatos->execute();
    $candidatos = $stmtCandidatos->fetch(PDO::FETCH_ASSOC);

    $temCandidatos = ($candidatos['total'] > 0);

    if (!$temCandidatos) {
        $sql = "DELETE FROM vaga WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("Location: ListarVagas.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Vaga</title>
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
        <?php if ($temCandidatos): ?>
            <div class="alert alert-warning text-center">
                <h4>Esta vaga não pode ser excluída!</h4>
                <p class="mb-0">
                    Existem <strong><?= $candidatos['total'] ?> candidato(s) inscrito(s)</strong> nesta vaga.
                    A chave estrangeira protege os dados: remova primeiro os candidatos (ou mantenha a vaga).
                </p>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                <h4>Erro ao excluir a vaga.</h4>
            </div>
        <?php endif; ?>
        <div class="text-center">
            <a href="ListarVagas.php" class="btn btn-primary">Voltar para a lista</a>
        </div>
    </main>
</body>
</html>