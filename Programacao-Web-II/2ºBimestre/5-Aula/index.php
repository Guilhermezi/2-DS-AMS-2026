<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Salário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cálculo de Salário</h1>

        <main class="box">
            <p>Preencha os campos abaixo para calcular o salário:</p>

            <form name="formSalario" action="calcularSalario.php" method="post">
                <label for="txthoras">Digite a quantidade de horas trabalhadas:</label>
                <br>
                <input type="text" id="txthoras" name="horas">
                <br>

                <label for="txtvalor">Digite o valor da Hora:</label>
                <br>
                <input type="text" id="txtvalor" name="valor">
                <br>

                <input class="botao" type="submit" value="Calcular Salário">
                <input class="botao" type="reset" value="Limpar">
            </form>
        </main>
    </div>
</body>
</html>