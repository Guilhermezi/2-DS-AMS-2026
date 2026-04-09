<?php 
// Esse comando define uma variável com o caminho para voltar uma pasta
// Como estamos na pasta 'pages', precisamos de '../' para achar o CSS e Imagens
$base_path = "../"; 

// O include traz o topo do seu site que está em outro arquivo
include '../include/header.php'; 
?>

<main class="container mt-5">
    <div class="text-center mb-5">
        <h1><?php echo "Nossos Cursos Técnicos"; ?></h1>
        <p><?php echo "Veja a lista de cursos da ETEC Zona Leste abaixo:"; ?></p>
    </div>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../image/Adm.png" class="card-img-top p-3" alt="Adm">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger"><?php echo "Administração"; ?></h5>
                    <p><?php echo "Aprenda sobre gestão de empresas e negócios."; ?></p>
                    <a href="inscricao.php" class="btn btn-danger"><?php echo "Inscrever-se"; ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../image/contabilidade.webp" class="card-img-top p-3" alt="Contabilidade">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger"><?php echo "Contabilidade"; ?></h5>
                    <p><?php echo "Foco em cálculos, impostos e finanças."; ?></p>
                    <a href="inscricao.php" class="btn btn-danger"><?php echo "Inscrever-se"; ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../image/IndianoCodando.png" class="card-img-top p-3" alt="DS">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger"><?php echo "Desenvolvimento de Sistemas"; ?></h5>
                    <p><?php echo "Criação de sites, sistemas e aplicativos."; ?></p>
                    <a href="inscricao.php" class="btn btn-danger"><?php echo "Inscrever-se"; ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../image/financas.webp" class="card-img-top p-3" alt="Finanças">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger"><?php echo "Finanças"; ?></h5>
                    <p><?php echo "Gestão de investimentos e controle bancário."; ?></p>
                    <a href="inscricao.php" class="btn btn-danger"><?php echo "Inscrever-se"; ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../image/Log.png" class="card-img-top p-3" alt="Logística">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger"><?php echo "Logística"; ?></h5>
                    <p><?php echo "Transporte, estoque e armazenamento."; ?></p>
                    <a href="inscricao.php" class="btn btn-danger"><?php echo "Inscrever-se"; ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../image/RH.jpg" class="card-img-top p-3" alt="RH">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger"><?php echo "Recursos Humanos"; ?></h5>
                    <p><?php echo "Gestão de pessoas e leis trabalhistas."; ?></p>
                    <a href="inscricao.php" class="btn btn-danger"><?php echo "Inscrever-se"; ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="../image/SJ.jpg" class="card-img-top p-3" alt="Jurídico">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-danger"><?php echo "Serviços Jurídicos"; ?></h5>
                    <p><?php echo "Suporte administrativo em escritórios de advocacia."; ?></p>
                    <a href="inscricao.php" class="btn btn-danger"><?php echo "Inscrever-se"; ?></a>
                </div>
            </div>
        </div>

    </div> </main>

<?php 
// O include traz o rodapé do seu site
include '../include/footer.php'; 
?>