-- ============================================================
-- Portal de Empregos / Vagas de Emprego
-- Banco de dados: MySQL / MariaDB
-- Entrega da disciplina Programação Web II - 3 Bimestre
-- ============================================================

CREATE DATABASE IF NOT EXISTS portal
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE portal;

-- ------------------------------------------------------------
-- Tabela de vagas de emprego
-- O título é único: não podem existir duas vagas com o mesmo nome.
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS vaga (
    id         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo     VARCHAR(50)  NOT NULL,
    descricao  VARCHAR(150),
    requisitos VARCHAR(100),
    salario    DECIMAL(10,2),
    CONSTRAINT uq_vaga_titulo UNIQUE (titulo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabela de candidatos inscritos
-- Um candidato pertence a uma vaga (candidato.vaga_id -> vaga.id)
-- O mesmo nome só pode se inscrever UMA vez em cada vaga.
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS candidato (
    id      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome    VARCHAR(100) NOT NULL,
    email   VARCHAR(100),
    vaga_id INT NOT NULL,
    CONSTRAINT fk_candidato_vaga
        FOREIGN KEY (vaga_id) REFERENCES vaga(id),
    CONSTRAINT uq_candidato_vaga UNIQUE (nome, vaga_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;