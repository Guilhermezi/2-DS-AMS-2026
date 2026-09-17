<?php
    include '../config/Conexao.php';

    $sql = "SELECT c.id, c.nome, c.email, v.titulo AS vaga_titulo
            FROM candidato c
            JOIN vaga v ON c.vaga_id = v.id";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Portal de Empregos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="../vaga/ListarVagas.php">Listar Vagas</a></li>
                    <li class="nav-item"><a class="nav-link" href="Inscricao.php">Inscrição</a></li>
                    <li class="nav-item"><a class="nav-link active" href="ListarCandidatos.php">Candidatos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Lista de Candidatos</h1>
            <a href="Inscricao.php" class="btn btn-primary">+ Nova inscrição</a>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Vaga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candidatos as $candidato): ?>
                        <tr>
                            <td><?= htmlspecialchars($candidato['id']) ?></td>
                            <td><?= htmlspecialchars($candidato['nome']) ?></td>
                            <td><?= htmlspecialchars($candidato['email']) ?></td>
                            <td><?= htmlspecialchars($candidato['vaga_titulo']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/formulario.js"></script>
</body>
</html>