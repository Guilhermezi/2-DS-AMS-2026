<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Zona Leste</title>
    <link rel="shortcut icon" href="<?php echo $base_path; ?>image/Cps.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">
    <link rel="stylesheet" href="<?php echo $base_path; ?>css/style.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $base_path; ?>index.php">
                <img src="<?php echo $base_path; ?>image/Cps.png" alt="logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>index.php"><i class="ri-home-fill"></i> Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>pages/inscricao.php"><i class="ri-survey-fill"></i>Inscrição</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>pages/cursos.php"><i class="ri-booklet-fill"></i>Cursos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>pages/pesquisa.php"><i class="ri-file-search-fill"></i>Pesquisa</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $base_path; ?>pages/contato.php"><i class="ri-phone-fill"></i>Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>