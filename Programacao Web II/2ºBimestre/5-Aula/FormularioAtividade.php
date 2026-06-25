<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Calculo de salário</title>
</head>
<body>
    <style>
            body{
            position: relative;
            background:linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4));
            height: 100vh;           
            display: flex;           
            justify-content: center; 
            align-items: center;     
    
        }
        .input input{
            justify-content: center;
            align-items: center;
            margin: 2px 5px;
            padding: 4px 0;
            width: 90%;
        }
        .submit{
            width: 100%;
        }
        .submit input{
            display: block;
            margin: 2px auto;
            padding: 2px 0;
            width: 50%;
        }
        .texto{
            color: #c0c6ce;
            font-size: 25px;
            font-family: "playpen Sans";
            background:  #010011;
            border-radius: 5%;
            border: solid rgb(54, 154, 216) ;
        }
    </style>
    <div class="texto">

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $horas = $_POST["horas"];
            $valor = $_POST["salario"];
            $diaria = $horas * $valor;
            $mensal = $diaria * 21;
            echo "<p>O pagamento diario é: R$ </p>" . number_format($diaria, 2, ",", ".");
            echo "<p>O pagamento mensal é: R$ </p>" . number_format($mensal, 2, ",", ".");
            }
            ?>
</div>
</body>
</html>