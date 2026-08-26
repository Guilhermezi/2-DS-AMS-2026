<?php
require_once __DIR__ . '/../models/Aluno.php';

$aluno = new Aluno($conexao);
$aluno->atualizar($_POST['id'], $_POST['nome'], $_POST['curso']);

header("Location: " . __DIR__ . "/../controllers/listar.php");
exit;
