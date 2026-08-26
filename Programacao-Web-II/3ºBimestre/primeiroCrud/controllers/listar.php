<?php
require_once __DIR__ . '/../models/Aluno.php';

$aluno = new Aluno($conexao);
$alunos = $aluno->listar();

require __DIR__ . '/../views/listar.php';
