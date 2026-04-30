<?php 
// 1. Caminho base: Como este arquivo está na pasta principal, o caminho é vazio ""
$base_path = ""; 

// O "include" serve para buscar o código do cabeçalho (menu e topo) e colar aqui
include 'include/header.php'; 

// Criei variáveis para guardar os textos. 
// Fica mais fácil de organizar o site assim!
$titulo_pagina = "Bem-vindo à ETEC Zona Leste";
$subtitulo_secao = "Nossos Cursos Técnicos";
?>

<main>
    <div id="carouselExampleIndicators" class="carousel slide shadow" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <img src="image/SalaMaker.png" class="d-block w-100" alt="Sala Maker">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5><?php echo "Inovação e Tecnologia"; ?></h5>
                    <p><?php echo "Conheça nossos laboratórios de ponta."; ?></p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="image/patio.webp" class="d-block w-100" alt="Patio ETEC">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5><?php echo "Ensino Gratuito de Qualidade"; ?></h5>
                    <p><?php echo "Prepare-se para o mercado com os melhores profissionais."; ?></p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="image/Biblioteca.webp" class="d-block w-100" alt="Biblioteca ETEC">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5><?php echo "Espaço de Estudo"; ?></h5>
                    <p><?php echo "Ambiente propício para o aprendizado e a pesquisa."; ?></p>
                </div>
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
        
        <h1 class="text-center mb-2 fw-bold text-danger"><?php echo $titulo_pagina; ?></h1>
        
        <p class="text-center text-muted mb-5">
            <?php echo "Excelência no ensino técnico na região de Itaquera e Cidade A.E. Carvalho."; ?>
        </p>
        
        <h2 class="mb-4 border-start border-danger border-4 ps-3">
            <?php echo $subtitulo_secao; ?>
        </h2>
        
        <div class="row g-4">
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="image/IndianoCodando.png" class="card-img-top p-2" alt="DS">
                    <div class="card-body">
                        <h5 class="fw-bold text-danger"><?php echo "Desenvolvimento de Sistemas"; ?></h5>
                        <p class="card-text"><?php echo "Aprenda a criar softwares, aplicativos e sites modernos."; ?></p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3">
                        <a href="pages/cursos.php" class="btn btn-outline-danger w-100"><?php echo "Saiba Mais"; ?></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="image/Adm.png" class="card-img-top p-2" alt="ADM">
                    <div class="card-body">
                        <h5 class="fw-bold text-danger"><?php echo "Administração"; ?></h5>
                        <p class="card-text"><?php echo "Foco em gestão, finanças e recursos humanos."; ?></p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3">
                        <a href="pages/cursos.php" class="btn btn-outline-danger w-100"><?php echo "Saiba Mais"; ?></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="image/Log.png" class="card-img-top p-2" alt="LOG">
                    <div class="card-body">
                        <h5 class="fw-bold text-danger"><?php echo "Logística"; ?></h5>
                        <p class="card-text"><?php echo "Planeje o transporte e estoque de mercadorias de forma eficiente."; ?></p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3">
                        <a href="pages/cursos.php" class="btn btn-outline-danger w-100"><?php echo "Saiba Mais"; ?></a>
                    </div>
                </div>
            </div>

        </div> </div>

    <section class="bg-danger text-white mt-5 py-5 text-center">
        <div class="container">
            <h2 class="fw-bold"><?php echo "Quer estudar na ETEC?"; ?></h2>
            <p class="lead"><?php echo "As inscrições acontecem semestralmente. Não perca essa chance!"; ?></p>
            
            <a href="https://www.vestibulinhoetec.com.br" target="_blank" class="btn btn-light btn-lg fw-bold px-5">
                <?php echo "ACESSAR VESTIBULINHO"; ?>
            </a>
        </div>
    </section>
</main>

<?php 
// O include traz o rodapé (footer) do site para fechar o código HTML
include 'include/footer.php'; 
?>