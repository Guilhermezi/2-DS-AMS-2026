# Checklist — Primeiro CRUD (MVC)

Projeto: cadastro de alunos (banco `escola`, tabela `aluno`) com PHP + PDO + MariaDB.
Arquitetura: MVC (Model-View-Controller).

---

## CRUD Funcional (prova de que funciona)
- [x] Parte 0 — Ambiente (MariaDB + banco `escola` + tabela `aluno`)
- [x] Parte 1 — CREATE (`conexao.php` + `index.html` + `salva.php`)
- [x] Parte 2 — READ (`listar.php` + `htmlspecialchars` + XSS blindado)
- [x] Parte 3 — UPDATE (`editar.php` + `atualiza.php` + campo hidden com id)
- [x] Parte 4 — DELETE (`excluir.php` + `onclick confirm` + `header Location`)
- [x] CSS + navegação (sem becos sem saída)

---

## Refatoração para MVC

### Estrutura final
```
primeiroCrud/
├── config/
│   └── conexao.php           ← conexão PDO (sem echo de sucesso)
├── models/
│   └── Aluno.php             ← classe com métodos de CRUD
├── controllers/
│   ├── salvar.php            ← INSERT → redirect
│   ├── listar.php            ← SELECT all → require view
│   ├── editar.php            ← SELECT one → require view
│   ├── atualizar.php         ← UPDATE → redirect
│   └── excluir.php           ← DELETE → redirect
├── views/
│   ├── cadastrar.php         ← form HTML (action → controller)
│   ├── listar.php            ← tabela HTML (recebe $alunos)
│   └── editar.php            ← form preenchido (recebe $aluno)
├── public/
│   └── style.css             ← arquivo estático
├── index.php                 ← ponto de entrada
└── checklist.md
```

### Fluxo de cada operação

**CREATE (cadastrar):**
index.php → views/cadastrar.php (form) → controllers/salvar.php → Aluno::cadastrar() → redirect para listar

**READ (listar):**
controllers/listar.php → Aluno::listar() → views/listar.php

**UPDATE (editar):**
controllers/listar.php (link) → controllers/editar.php → Aluno::buscarPorId() → views/editar.php (form) → controllers/atualizar.php → Aluno::atualizar() → redirect para listar

**DELETE (excluir):**
controllers/listar.php (link + confirm) → controllers/excluir.php → Aluno::excluir() → redirect para listar

### Etapas concluídas
- [x] Etapa 0 — Pastas minúsculas (config/, models/, controllers/, views/, public/)
- [x] Etapa 1 — style.css em public/
- [x] Etapa 2 — models/Aluno.php criada
- [x] Etapa 3 — Controllers refatorados (wiring puro)
- [x] Etapa 4 — Views refatoradas (HTML puro)
- [x] Etapa 5 — index.php como ponto de entrada
- [x] Etapa 6 — Todos os caminhos ajustados (include, href, action)
- [x] Etapa 7 — Campo ID removido do form de cadastro
- [x] Etapa 8 — Pastas antigas removidas
- [x] Etapa 9 — Sintaxe PHP verificada (0 erros)
- [x] Etapa 10 — Testar fluxo completo

### Conceitos-chave (para revisão)
- `require_once` no lugar de `include` — se o arquivo falhar, PHP para na hora
- Controller nunca mostra HTML — chama Model, passa dados para View via require
- View nunca faz query — recebe dados prontos via variável ($alunos, $aluno)
- Model não sabe que existe HTML — só devolve arrays e bool
- `header("Location:")` precisa de `exit` depois — sem isso PHP continua executando
- No Linux, caminhos de arquivo são case-sensitive — `Config/` ≠ `config/`
- `$conexao` via construtor (dependency injection) — não usar `global`
- `__DIR__` resolves relative paths reliably from any file location

### Perguntas para revisão
1. Qual a diferença entre `include` e `require`? E entre `require` e `require_once`?
2. O Controller pode ter `echo` de HTML? Por quê não?
3. O que muda se amanhã eu quiser trocar o HTML por uma API JSON? Só a View muda? Por quê?
4. Se o banco mudar de `escola` para `faculdade`, quantos arquivos preciso alterar?
5. Como eu adicionaria um quarto campo (ex: `email`) na tabela? Quais camadas precisam mudar?
