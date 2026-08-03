<?php 
// 1. Variável para ajudar o navegador a achar as pastas de CSS e Imagem
// O "../" significa: "Saia da pasta pages e vá para a pasta principal"
$base_path = "../"; 

// O include serve para "colar" o código do cabeçalho aqui dentro
include '../include/header.php'; 
?>

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 p-4 shadow rounded bg-white border">
            
            <?php
            /* LÓGICA PHP PARA INICIANTES:
               O código abaixo verifica: "O usuário apertou o botão de Enviar?"
               Se SIM, ele mostra os dados. Se NÃO, ele mostra o formulário.
            */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                // Se cair aqui, é porque o formulário foi enviado.
                // Usamos o comando "echo" para imprimir as frases na tela.
                
                echo "<div class='text-center'>";
                    echo "<h1>" . "Sucesso!" . "</h1>";
                    echo "<hr>"; // Linha horizontal
                    
                    // Pegamos o que o usuário digitou usando $_POST["nome_do_campo"]
                    echo "<p>Oi, <b>" . $_POST["nome"] . "</b>!</p>";
                    echo "<p>Sua idade é: <b>" . $_POST["idade"] . " anos</b></p>";
                    echo "<p>Seu e-mail registrado: <b>" . $_POST["email"] . "</b></p>";
                    echo "<p>Gênero: <b>" . $_POST["genero"] . "</b></p>";
                    echo "<p>Curso escolhido: <b>" . $_POST["curso"] . "</b></p>";
                    echo "<p>Turno: <b>" . $_POST["turno"] . "</b></p>";
                    
                    echo "<div class='alert alert-danger mt-3'>";
                        echo "Sua pré-inscrição para a ETEC foi enviada!";
                    echo "</div>";
                    
                    // Botão simples para recarregar a página e limpar tudo
                    echo "<a href='inscricao.php' class='btn btn-dark mt-3'>Fazer outra inscrição</a>";
                echo "</div>";

            } else {
                // Se cair aqui, é porque a página acabou de abrir e o formulário deve aparecer.
            ?>
                
                <h2 class="text-center text-danger mb-4"><?php echo "Ficha de Inscrição ETEC"; ?></h2>
                
                <form action="inscricao.php" method="POST">
                    
                    <div class="mb-3">
                        <label><b>Nome Completo:</b></label>
                        <input type="text" name="nome" class="form-control" placeholder="Ex: João Silva" required>
                    </div>

                    <div class="mb-3">
                        <label><b>Sua Idade:</b></label>
                        <input type="number" name="idade" class="form-control" placeholder="Ex: 16" required>
                    </div>

                    <div class="mb-3">
                        <label><b>E-mail para contato:</b></label>
                        <input type="email" name="email" class="form-control" placeholder="email@exemplo.com" required>
                    </div>

                    <div class="mb-3 border p-2 rounded">
                        <label class="d-block"><b>Gênero:</b></label>
                        <input type="radio" name="genero" value="Masculino" checked> Masculino
                        <input type="radio" name="genero" value="Feminino" class="ms-3"> Feminino
                    </div>

                    <div class="mb-3">
                        <label><b>Qual curso deseja fazer?</b></label>
                        <select name="curso" class="form-select">
                            <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                            <option value="Administração">Administração</option>
                            <option value="Logística">Logística</option>
                            <option value="Contabilidade">Contabilidade</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label><b>Período:</b></label>
                        <select name="turno" class="form-select">
                            <option value="Manhã">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger w-100 fw-bold">
                        <?php echo "FINALIZAR MINHA INSCRIÇÃO"; ?>
                    </button>
                    
                </form>

            <?php 
            } // Aqui fechamos o "else" do PHP
            ?>

        </div>
    </div>
</main>

<?php 
// O include traz o rodapé do seu site para fechar a página
include '../include/footer.php'; 
?>