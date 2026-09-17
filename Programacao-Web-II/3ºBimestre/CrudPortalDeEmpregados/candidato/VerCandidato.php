<?php
    include '../config/Conexao.php';

    $id = $_GET['id'] ?? null;
    if ($id === null) {
        echo "ID da vaga não fornecido.";
        exit;
    }

    $sqlVaga = "SELECT titulo FROM vaga WHERE id = :id";
    $stmtVaga = $conexao->prepare($sqlVaga);
    $stmtVaga->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtVaga->execute();
    $vaga = $stmtVaga->fetch(PDO::FETCH_ASSOC);

    if (!$vaga) {
        header("Location: ../vaga/ListarVagas.php");
        exit;
    }

    $sql = "SELECT c.id, c.nome, c.email
            FROM candidato c
            WHERE c.vaga_id = :vaga_id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':vaga_id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidatos da Vaga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Portal de Empregos</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../vaga/ListarVagas.php">Listar Vagas</a></li>
                    <li class="nav-item"><a class="nav-link" href="Inscricao.php">Inscrição</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <h1 class="h3 mb-3">Candidatos da Vaga: <?= htmlspecialchars($vaga['titulo']) ?></h1>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candidatos as $candidato): ?>
                        <tr>
                            <td><?= htmlspecialchars($candidato['id']) ?></td>
                            <td><?= htmlspecialchars($candidato['nome']) ?></td>
                            <td><?= htmlspecialchars($candidato['email']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="mt-3"><a href="../vaga/ListarVagas.php">&larr; Voltar</a></p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/formulario.js"></script>
</body>
</html>