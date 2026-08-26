<?php
require_once __DIR__ . '/../models/Aluno.php';

$id = $_GET['id'] ?? null;
if ($id === null) {
    header("Location: " . __DIR__ . "/../controllers/listar.php");
    exit;
}

$aluno = new Aluno($conexao);
$aluno = $aluno->buscarPorId($id);

require __DIR__ . '/../views/editar.php';
