<?php
    include '../config/Conexao.php';

    $sql = "SELECT * FROM portal.vaga";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $vagas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vagas</title>
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
                    <li class="nav-item"><a class="nav-link" href="CadastrarVaga.php">Cadastrar Vaga</a></li>
                    <li class="nav-item"><a class="nav-link active" href="ListarVagas.php">Listar Vagas</a></li>
                    <li class="nav-item"><a class="nav-link" href="../candidato/Inscricao.php">Inscrição</a></li>
                    <li class="nav-item"><a class="nav-link" href="../candidato/ListarCandidatos.php">Candidatos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Lista de Vagas</h1>
            <a href="CadastrarVaga.php" class="btn btn-primary">+ Cadastrar nova vaga</a>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Requisitos</th>
                            <th>Salário</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vagas as $vaga): ?>
                        <tr>
                            <td><?= htmlspecialchars($vaga['id']) ?></td>
                            <td><?= htmlspecialchars($vaga['titulo']) ?></td>
                            <td><?= htmlspecialchars($vaga['descricao']) ?></td>
                            <td><?= htmlspecialchars($vaga['requisitos']) ?></td>
                            <td>R$ <?= number_format($vaga['salario'], 2, ',', '.') ?></td>
                            <td class="text-end">
                                <a href="../candidato/VerCandidato.php?id=<?= $vaga['id'] ?>" class="btn btn-info btn-sm">Ver candidatos</a>
                                <a href="EditarVaga.php?id=<?= $vaga['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalExcluir"
                                        data-delete-url="ExcluirVaga.php?id=<?= $vaga['id'] ?>">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modalExcluir" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir vaga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir esta vaga?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" id="confirmarExcluir" class="btn btn-danger">Excluir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/formulario.js"></script>
</body>
</html>