<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabuada while</title>
</head>
<body>
    <?php
        $num = $_POST['num'];
        $i = 0;
        while ($i <= 10) {
            echo $num . " x " . $i . " = " . ($num * $i) . "<br>";
            $i++;
        }
    ?>
</body>
</html>
