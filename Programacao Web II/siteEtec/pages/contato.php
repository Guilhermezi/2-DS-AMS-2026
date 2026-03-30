<?php 
$base_path = "../"; 
include '../include/header.php'; 

// SISTEMA PHP SIMPLES (Tudo em um arquivo só)
$exibir_resultado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exibir_resultado = true;
}
?>

<main class="container mt-5">
    <section id="Contato">
        
        <?php if ($exibir_resultado): ?>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center p-5 shadow rounded bg-white border">
                    <i class="ri-checkbox-circle-fill text-success" style="font-size: 50px;"></i>
                    <h2 class="fw-bold mt-3"><?php echo "Mensagem Recebida!"; ?></h2>
                    <hr>
                    <p class="fs-5">
                        <?php 
                        echo "Oi, <strong>" . $_POST["nome"] . "</strong>! ";
                        echo "Recebemos seu contato sobre a ETEC.";
                        ?>
                    </p>
                    <p class="text-muted">
                        <?php 
                        echo "Enviaremos um retorno para: " . $_POST["email"]; 
                        ?>
                    </p>
                    <div class="alert alert-light border">
                        <strong><?php echo "Sua mensagem foi:"; ?></strong><br>
                        <?php echo $_POST["mensagem"]; ?>
                    </div>
                    <a href="contato.php" class="btn btn-danger px-4 mt-3"><?php echo "Voltar"; ?></a>
                </div>
            </div>

        <?php else: ?>
            <div class="row g-5"> 
                <div class="col-lg-7">
                    <div class="p-4 shadow-sm bg-white rounded border">
                        <h2 class="fw-bold text-danger mb-3"><?php echo "Entre em Contato Conosco"; ?></h2>
                        <p class="text-muted mb-4"><?php echo "Tem alguma dúvida ou sugestão? Fale com a secretaria da ETEC Zona Leste!"; ?></p>
                        
                        <form action="contato.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bold"><?php echo "Nome:"; ?></label>
                                <input type="text" class="form-control" name="nome" required placeholder="Digite seu nome">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold"><?php echo "E-mail:"; ?></label>
                                <input type="email" class="form-control" name="email" required placeholder="exemplo@email.com">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold"><?php echo "Mensagem:"; ?></label>
                                <textarea class="form-control" name="mensagem" rows="5" required placeholder="Como podemos te ajudar?"></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger w-100 fw-bold py-2 shadow-sm">
                                <?php echo "ENVIAR MENSAGEM"; ?>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded border h-100 shadow-sm">
                        <h3 class="fw-bold mb-4"><?php echo "Canais Oficiais"; ?></h3>
                        
                        <div class="mb-4">
                            <p class="mb-1 fw-bold text-danger"><i class="ri-mail-line"></i> <?php echo "E-mail Secretaria:"; ?></p>
                            <p class="text-muted"><?php echo "e198.secretaria@cps.sp.gov.br"; ?></p>
                        </div>

                        <div class="mb-4">
                            <p class="mb-1 fw-bold text-danger"><i class="ri-map-pin-line"></i> <?php echo "Localização:"; ?></p>
                            <p class="text-muted small"><?php echo "Av. Águia de Haia, 2633 - Cidade Antônio Estêvão de Carvalho, São Paulo - SP"; ?></p>
                        </div>

                        <hr>

                        <h5 class="fw-bold mb-3"><?php echo "Siga a ETEC"; ?></h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-primary btn-sm px-3"><i class="ri-facebook-box-fill"></i> Facebook</a>
                            <a href="#" class="btn btn-outline-danger btn-sm px-3"><i class="ri-instagram-line"></i> Instagram</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </section>
</main>

<?php include '../include/footer.php'; ?>