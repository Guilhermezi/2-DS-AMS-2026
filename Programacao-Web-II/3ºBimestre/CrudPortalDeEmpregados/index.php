<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Empregos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Portal de Empregos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="vaga/CadastrarVaga.php">Cadastrar Vaga</a></li>
                    <li class="nav-item"><a class="nav-link" href="vaga/ListarVagas.php">Listar Vagas</a></li>
                    <li class="nav-item"><a class="nav-link" href="candidato/Inscricao.php">Inscrição</a></li>
                    <li class="nav-item"><a class="nav-link" href="candidato/ListarCandidatos.php">Candidatos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <h1 class="text-center mb-4">Portal de Empregos</h1>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cadastrar Vaga</h5>
                        <p class="card-text">Cadastre novas vagas com título, requisitos e salário.</p>
                        <a href="vaga/CadastrarVaga.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Listar Vagas</h5>
                        <p class="card-text">Consulte, edite ou exclua as vagas do portal.</p>
                        <a href="vaga/ListarVagas.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Inscrição</h5>
                        <p class="card-text">Cadastre candidatos escolhendo a vaga desejada.</p>
                        <a href="candidato/Inscricao.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Candidatos</h5>
                        <p class="card-text">Veja todos os candidatos inscritos no portal.</p>
                        <a href="candidato/ListarCandidatos.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/formulario.js"></script>
</body>
</html>