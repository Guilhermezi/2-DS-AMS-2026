<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores</title>
</head>
<body>
    <?php
    // Abre o bloco de código PHP. Tudo aqui é executado no servidor antes de enviar a página ao navegador.
    // O que estiver depois de "//" é comentário e não é executado.
        echo "Segue abaixo as informações digitadas na página anterior:<br><br>";
        // echo imprime texto na tela. Os <br> adicionam duas quebras de linha no HTML gerado.

        echo "Nome: " . $_POST['nome'] . "<br>";
        // Imprime "Nome: " concatenado (com o operador . ) ao valor recebido do formulário.
        // $_POST['nome'] contém o valor digitado no campo name="nome" da página anterior.
        // O <br> quebra a linha.

        echo "Telefone: " . $_POST['telefone'] . "<br>";
        // Imprime "Telefone: " seguido do valor do campo name="telefone" do formulário.

        echo "RG: " . $_POST['rg'] . "<br>";
        // Imprime "RG: " seguido do valor do campo name="rg" do formulário.

        echo "Curso: " . $_POST['curso'] . "<br>";
        // Imprime "Curso: " seguido do valor escolhido no menu suspenso (select).
        // Como as <option> tinham value="informatica" etc., aqui aparece o value, não o texto exibido na lista.

        echo "Módulo: " . $_POST['txtmodulo'] . "<br>";
        // Imprime "Módulo: " seguido do valor do campo name="txtmodulo".
    ?>
    <!-- Fecha o bloco de código PHP. Tudo depois desta tag volta a ser HTML normal. -->
</body>
</html>
