<?php 
// Como este arquivo está na pasta /pages, precisamos subir um nível para achar os includes
$base_path = "../"; 
include '../include/header.php'; 

// Lógica simples de PHP para feedback do formulário
$mensagem_sucesso = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    // Aqui você poderia salvar no banco ou enviar por email
    $mensagem_sucesso = "Obrigado, $nome! Sua mensagem foi enviada para a secretaria da ETEC.";
}
?>

<main class="container mt-5">
    <section id="Contato">
        <div class="row g-5"> <div class="col-lg-7">
                <div class="p-4 shadow-sm bg-white rounded border">
                    <h2 class="fw-bold text-danger mb-3">Entre em Contato Conosco</h2>
                    <p class="text-muted mb-4">Tem alguma dúvida sobre o vestibulinho, cursos ou eventos? A secretaria da ETEC Zona Leste está pronta para ajudar!</p>
                    
                    <?php if($mensagem_sucesso): ?>
                        <div class="alert alert-success"><?php echo $mensagem_sucesso; ?></div>
                    <?php endif; ?>

                    <form action="contato.php" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label fw-bold">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite seu nome">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@email.com">
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label fw-bold">Telefone / WhatsApp</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required placeholder="(11) 99999-9999">
                        </div>

                        <div class="mb-3">
                            <label for="mensagem" class="form-label fw-bold">Assunto/Mensagem</label>
                            <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required placeholder="Como podemos te ajudar?"></textarea>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 fw-bold">ENVIAR MENSAGEM</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="bg-light p-4 rounded border h-100">
                    <h3 class="fw-bold mb-4">Informações de Contato</h3>
                    
                    <div class="mb-4">
                        <p class="mb-1 fw-bold text-danger"><i class="ri-mail-line"></i> E-mail Secretaria</p>
                        <p class="text-muted">e198.secretaria@cps.sp.gov.br</p>
                    </div>

                    <div class="mb-4">
                        <p class="mb-1 fw-bold text-danger"><i class="ri-phone-line"></i> Telefone</p>
                        <p class="text-muted">(11) 2045-4000</p>
                    </div>

                    <div class="mb-4">
                        <p class="mb-1 fw-bold text-danger"><i class="ri-map-pin-line"></i> Localização</p>
                        <p class="text-muted">Av. Águia de Haia, 2633<br>Cidade Antônio Estêvão de Carvalho<br>São Paulo - SP, 03889-000</p>
                    </div>

                    <div class="mb-4">
                        <p class="mb-1 fw-bold text-danger"><i class="ri-time-line"></i> Horário de Atendimento</p>
                        <p class="text-muted small">Segunda a Sexta: 08:00 - 20:00<br>Sábado e Domingo: Fechado</p>
                    </div>

                    <hr>

                    <h5 class="fw-bold mb-3">Redes Sociais</h5>
                    <div class="d-flex gap-3">
                        <a href="https://facebook.com/eteczonaleste" class="btn btn-outline-primary btn-sm"><i class="ri-facebook-box-fill"></i> Facebook</a>
                        <a href="https://instagram.com/eteczonaleste" class="btn btn-outline-danger btn-sm"><i class="ri-instagram-line"></i> Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../include/footer.php'; ?>