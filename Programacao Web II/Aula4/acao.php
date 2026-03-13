<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Resultado</title>
<link rel="stylesheet" href="stylephp.css">
</head>
<body>

<?php
echo "Oi, ";
echo $_POST["nome"];
echo ". Você tem ";
echo $_POST["idade"];
echo " anos.";
?>

</body>
</html>