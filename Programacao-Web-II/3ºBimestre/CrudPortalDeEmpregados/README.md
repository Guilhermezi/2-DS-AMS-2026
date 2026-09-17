# Portal de Empregos / Vagas de Emprego

Sistema web de **cadastro de vagas de emprego** com **inscrição de candidatos**, desenvolvido em **PHP**, **MySQL**, **Bootstrap** e **JavaScript** para a disciplina de **Programação Web II**.

## Funcionalidades

Conforme a lista da atividade:

- **Cadastro de vagas** disponíveis: título, descrição, requisitos e salário
- **Consulta (listagem)** de vagas, com opção de editar e excluir
- **Lista de candidatos inscritos**, mostrando a vaga de cada candidato
- **Ver candidatos por vaga**: ao clicar em "Ver candidatos" em uma vaga, são exibidos apenas os inscritos nela
- **Bootstrap**: interface responsiva (navbar, cards, tabelas, formulários, alertas e modal)
- **JavaScript**: validação de formulários no cliente e modal de confirmação de exclusão

## Tecnologias Utilizadas

- **PHP 8** (PDO com prepared statements — proteção contra SQL Injection)
- **MySQL / MariaDB** (banco de dados relacional)
- **Bootstrap 5** (CDN — interface responsiva)
- **JavaScript** (validação de formulário e interação do modal)

## Requisitos para executar

- PHP 8 instalado (com extensão `pdo_mysql`)
- MySQL ou MariaDB em execução
- Navegador web

## Como executar

1. Criar o banco de dados executando o arquivo **`portal.sql`** no seu gerenciador MySQL (DBeaver, phpMyAdmin, terminal, etc.).
2. Conferir a conexão no arquivo `config/Conexao.php` (host, usuário e senha do seu servidor MySQL).
3. No terminal, dentro da pasta do projeto, iniciar o servidor:

```bash
php -S localhost:8000
```

4. Abrir no navegador: `http://localhost:8000`

## Estrutura do Projeto

```
CrudPortalDeEmpregados/
├── index.php                    → menu principal
├── portal.sql                   → script de criação do banco
├── config/
│   └── Conexao.php              → conexão com o banco (PDO)
├── vaga/
│   ├── CadastrarVaga.php        → formulário de novo cadastro (Create)
│   ├── SalvarVaga.php           → grava a vaga no banco
│   ├── ListarVagas.php          → listagem das vagas (Read)
│   ├── EditarVaga.php           → formulário de edição
│   ├── AtualizarVaga.php        → atualiza a vaga (Update)
│   └── ExcluirVaga.php          → exclui a vaga (Delete)
├── candidato/
│   ├── Inscricao.php            → formulário de inscrição de candidato
│   ├── SalvarCandidato.php      → grava a inscrição
│   ├── ListarCandidatos.php     → lista todos os inscritos (com o nome da vaga)
│   └── VerCandidato.php         → lista os candidatos de uma vaga específica
└── public/js/
    └── formulario.js            → JavaScript (validação + modal de exclusão)
```

## Operações CRUD

| Operação | Vagas | Candidatos |
|---|---|---|
| **Create** | `CadastrarVaga.php` → `SalvarVaga.php` | `Inscricao.php` → `SalvarCandidato.php` |
| **Read** | `ListarVagas.php` | `ListarCandidatos.php` / `VerCandidato.php` |
| **Update** | `EditarVaga.php` → `AtualizarVaga.php` | — |
| **Delete** | `ExcluirVaga.php` (com confirmação via modal JS) | — |

## Modelo de Dados

- **vaga**: `id`, `titulo`, `descricao`, `requisitos`, `salario`
- **candidato**: `id`, `nome`, `email`, `vaga_id` (chave estrangeira → `vaga.id`)

Um **candidato pertence a uma vaga** (relação muitos para um: várias candidaturas para a mesma vaga).

## Formato de Entrega

- Repositório no GitHub com o `README` completo
- Arquivo SQL: `portal.sql`
- Tutorial em vídeo navegando pelo site com as operações de CRUD

---
Projeto desenvolvido para a disciplina de Programação Web II — 2º DS.