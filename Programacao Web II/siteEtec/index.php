<?php 
// Define o caminho base para não quebrar links em subpastas
$base_path = ""; 
include 'include/header.php'; 
?>

<main>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/image.png" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="image/image.png" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="image/image.png" class="d-block w-100" alt="Banner 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-5 fw-bold">Nossos Cursos</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="image/image.png" class="card-img p-2" alt="DS">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Desenvolvimento de Sistemas</h5>
                        <p class="text-muted">Aprenda programação, banco de dados e desenvolvimento web.</p>
                        <a href="pages/cursos.php" class="btn btn-danger btn-sm">Ver Detalhes</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="image/image.png" class="card-img p-2" alt="ADM">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Administração</h5>
                        <p class="text-muted">Gestão empresarial, finanças e organização de processos.</p>
                        <a href="pages/cursos.php" class="btn btn-danger btn-sm">Ver Detalhes</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="image/image.png" class="card-img p-2" alt="LOG">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Logística</h5>
                        <p class="text-muted">Controle de estoque, transporte e cadeia de suprimentos.</p>
                        <a href="pages/cursos.php" class="btn btn-danger btn-sm">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'include/footer.php'; ?>