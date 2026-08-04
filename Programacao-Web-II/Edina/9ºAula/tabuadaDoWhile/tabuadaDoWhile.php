<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabuada do while</title>
</head>
<body>
    <?php
        $num = $_POST['num'];
        $i = 0;
        do {
            echo $num . " x " . $i . " = " . ($num * $i) . "<br>";
            $i++;
        } while ($i <= 10);
    ?>
</body>
</html>
