<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição de Candidato</title>
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
                    <li class="nav-item"><a class="nav-link active" href="Inscricao.php">Inscrição</a></li>
                    <li class="nav-item"><a class="nav-link" href="ListarCandidatos.php">Candidatos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5" style="max-width: 640px;">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h1 class="h4 mb-0">Inscrição de Candidato</h1>
            </div>
            <div class="card-body">
                <form action="SalvarCandidato.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                        <div class="invalid-feedback">Informe o nome do candidato.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        <div class="invalid-feedback">Informe um email válido.</div>
                    </div>

                    <?php
                    include '../config/Conexao.php';
                    $sql = "SELECT id, titulo FROM portal.vaga";
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();
                    $vagas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="mb-3">
                        <label for="vaga_id" class="form-label">Vaga</label>
                        <select name="vaga_id" id="vaga_id" class="form-select" required>
                            <option value="">Selecione uma vaga</option>
                            <?php foreach ($vagas as $vaga): ?>
                            <option value="<?= $vaga['id'] ?>"><?= htmlspecialchars($vaga['titulo']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Selecione a vaga desejada.</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Cadastrar Inscrição</button>
                </form>
            </div>
        </div>
        <p class="text-center mt-3"><a href="ListarCandidatos.php">Ver lista de candidatos</a></p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/formulario.js"></script>
</body>
</html>