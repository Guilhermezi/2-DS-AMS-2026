<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Vaga</title>
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
                    <li class="nav-item"><a class="nav-link active" href="CadastrarVaga.php">Cadastrar Vaga</a></li>
                    <li class="nav-item"><a class="nav-link" href="ListarVagas.php">Listar Vagas</a></li>
                    <li class="nav-item"><a class="nav-link" href="../candidato/Inscricao.php">Inscrição</a></li>
                    <li class="nav-item"><a class="nav-link" href="../candidato/ListarCandidatos.php">Candidatos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5" style="max-width: 640px;">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h1 class="h4 mb-0">Cadastrar Vaga</h1>
            </div>
            <div class="card-body">
                <form action="SalvarVaga.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" required>
                        <div class="invalid-feedback">Informe o título da vaga.</div>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" required>
                        <div class="invalid-feedback">Informe a descrição da vaga.</div>
                    </div>

                    <div class="mb-3">
                        <label for="requisitos" class="form-label">Requisitos</label>
                        <input type="text" id="requisitos" name="requisitos" class="form-control" required>
                        <div class="invalid-feedback">Informe os requisitos da vaga.</div>
                    </div>

                    <div class="mb-3">
                        <label for="salario" class="form-label">Salário</label>
                        <input type="number" id="salario" name="salario" step="0.01" min="0.01" class="form-control" required>
                        <div class="invalid-feedback">Informe o salário (maior que zero).</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Cadastrar Vaga</button>
                </form>
            </div>
        </div>
        <p class="text-center mt-3"><a href="ListarVagas.php">Ver lista de vagas</a></p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/formulario.js"></script>
</body>
</html>