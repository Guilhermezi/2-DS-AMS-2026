<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "escola";

    try {
        $conexao = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        echo "Conexão bem-sucedida!";
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>