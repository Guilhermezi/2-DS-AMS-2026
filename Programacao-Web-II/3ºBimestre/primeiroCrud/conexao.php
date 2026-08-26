<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "escola";

    try {
        $conexao = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>