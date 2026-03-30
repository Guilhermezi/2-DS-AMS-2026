<?php 
$base_path = "../"; 
include '../include/header.php'; 

// LÓGICA PHP SIMPLES
$enviado = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enviado = true;
}
?>

<main class="container mt-5">
    <section id="Pesquisa">
        
        <?php if ($enviado): ?>
            <div class="row justify-content-center text-center">
                <div class="col-md-7 p-5 shadow rounded bg-white border">
                    <h2 class="text-success fw-bold"><?php echo "Obrigado pela sua participação!"; ?></h2>
                    <hr>
                    <p class="fs-5">
                        <?php 
                        echo "Oi, <strong>" . $_POST["nome"] . "</strong>! ";
                        echo "Sua avaliação sobre a ETEC Zona Leste foi registrada com sucesso."; 
                        ?>
                    </p>
                    <div class="bg-light p-3 rounded mb-4 text-start">
                        <strong><?php echo "Resumo da sua avaliação:"; ?></strong><br>
                        <?php 
                        echo "- Professores: <strong>" . $_POST["professores"] . "</strong><br>";
                        echo "- Estrutura: <strong>" . $_POST["estrutura"] . "</strong><br>";
                        echo "- Recomendaria a escola? <strong>" . $_POST["recomenda"] . "</strong>";
                        ?>
                    </div>
                    <p class="text-muted small"><?php echo "Sua opinião ajuda a melhorar nossa unidade!"; ?></p>
                    <a href="pesquisa.php" class="btn btn-danger px-5"><?php echo "Nova Pesquisa"; ?></a>
                </div>
            </div>

        <?php else: ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-4 shadow-sm bg-white rounded border">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-danger"><?php echo "Pesquisa de Satisfação"; ?></h2>
                            <p class="text-muted"><?php echo "Sua opinião é fundamental para o crescimento da ETEC Zona Leste."; ?></p>
                        </div>

                        <form action="pesquisa.php" method="POST">
                            <div class="mb-4">
                                <label class="form-label fw-bold"><?php echo "Seu Nome:"; ?></label>
                                <input type="text" name="nome" class="form-control" required placeholder="Digite seu nome completo">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold d-block"><?php echo "Como você avalia a didática dos professores?"; ?></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="professores" value="Excelente" required>
                                    <label class="form-check-label"><?php echo "Excelente"; ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="professores" value="Bom">
                                    <label class="form-check-label"><?php echo "Bom"; ?></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="professores" value="Regular">
                                    <label class="form-check-label"><?php echo "Regular"; ?></label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold"><?php echo "O que você acha da estrutura física (Laboratórios/Salas)?"; ?></label>
                                <select name="estrutura" class="form-select" required>
                                    <option value="" selected disabled><?php echo "Selecione uma opção"; ?></option>
                                    <option value="Muito Satisfeito"><?php echo "Muito Satisfeito"; ?></option>
                                    <option value="Satisfeito"><?php echo "Satisfeito"; ?></option>
                                    <option value="Insatisfeito"><?php echo "Insatisfeito"; ?></option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold d-block"><?php echo "Você recomendaria a ETEC Zona Leste para um amigo?"; ?></label>
                                <div class="btn-group w-100" role="group">
                                    <input type="radio" class="btn-check" name="recomenda" id="sim" value="Sim" required>
                                    <label class="btn-outline-success btn" for="sim"><?php echo "Sim, com certeza!"; ?></label>

                                    <input type="radio" class="btn-check" name="recomenda" id="nao" value="Não">
                                    <label class="btn-outline-danger btn" for="nao"><?php echo "Não no momento"; ?></label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold"><?php echo "Deixe uma sugestão de melhoria:"; ?></label>
                                <textarea name="sugestao" class="form-control" rows="3" placeholder="Ex: Melhorar o Wi-Fi dos laboratórios..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger w-100 fw-bold py-2">
                                <i class="ri-bar-chart-box-line"></i> <?php echo "ENVIAR AVALIAÇÃO"; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </section>
</main>

<?php include '../include/footer.php'; ?>