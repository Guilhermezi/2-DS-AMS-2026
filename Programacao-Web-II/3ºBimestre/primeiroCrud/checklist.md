# Checklist — Primeiro CRUD

Projeto: cadastro de alunos (banco `escola`, tabela `aluno`) com PHP + PDO + MariaDB.

## Nomenclatura atual (CRUD)
```
primeiroCrud/
├── create.php    ← C: formulário para cadastrar novo aluno
├── insert.php    ← C: recebe o POST e faz o INSERT
├── read.php      ← R: lista todos os alunos (tabela HTML)
├── edit.php      ← U: formulário pré-preenchido para editar
├── update.php    ← U: recebe o POST e faz o UPDATE
├── delete.php    ← D: recebe o id e faz o DELETE
├── conexao.php      — conexão PDO
├── style.css        — visual
└── checklist.md
```

## Fluxo (passo a passo)
1. **create.php** — formulário manda o POST para `insert.php`
2. **insert.php** — INSERT no banco → link para `read.php`
3. **read.php** — SELECT + tabela, cada linha com "Editar" → `edit.php?id=...` e "Excluir" → `delete.php?id=...`
4. **edit.php** — SELECT WHERE id, form pré-preenchido manda POST para `update.php`
5. **update.php** — UPDATE ... WHERE id → link para `read.php`
6. **delete.php** — DELETE ... WHERE id → redireciona para `read.php`

## Nomenclatura inicial (de onde veio cada arquivo)
- Parte 1: `index.html` → `create.php` | `salva.php` → `insert.php`
- Parte 2: `listar.php` → `read.php`
- Parte 3: `editar.php` → `edit.php` | `atualiza.php` → `update.php`
- Parte 4: `excluir.php` → `delete.php`