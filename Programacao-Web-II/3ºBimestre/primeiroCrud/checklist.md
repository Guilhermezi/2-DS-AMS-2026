# Checklist — Primeiro CRUD

Projeto: cadastro de alunos (banco `escola`, tabela `aluno`) com PHP + PDO + MariaDB.
Regra de ouro: nenhum código pronto — só perguntas que levam ao código escrito por mim.

## Parte 0 — Ambiente
- [x] MariaDB e Apache rodando
- [x] Criar o banco `escola`
- [x] Criar a tabela `aluno` (decidir colunas e tipos antes)

## Parte 1 — CREATE (cadastrar)
- [x] `conexao.php` — conexão PDO (base: aula1/conexao.md, senha da aula2)
- [x] `index.html` — formulário com campos nome e curso, method POST
- [x] `salvar.php` — recebe $_POST e faz INSERT (base: aula2/conexao02.md)

## Parte 2 — READ (listar)
- [x] `listar.php` — SELECT de todos os alunos + foreach montando tabela HTML
- [x] Link entre index.html e listar.php

## Parte 3 — UPDATE (editar)
- [x] `editar.php` — recebe id pela URL, busca o aluno, formulário pré-preenchido
- [x] `atualizar.php` — UPDATE ... WHERE id
- [x] Link "Editar" na listagem

## Parte 4 — DELETE (excluir)
- [ ] `excluir.php` — DELETE FROM ... WHERE id
- [ ] Link "Excluir" na listagem

## Perguntas-guia da Parte 0
1. O que precisa existir primeiro: banco ou tabela?
2. Como diferenciar dois "João"? Que coluna resolve isso sozinha?
3. VARCHAR(100) aguenta nomes de curso? INT serviria para nome?
