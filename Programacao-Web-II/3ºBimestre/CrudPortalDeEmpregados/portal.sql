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
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS vaga (
    id         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo     VARCHAR(50)  NOT NULL,
    descricao  VARCHAR(150),
    requisitos VARCHAR(100),
    salario    DECIMAL(10,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabela de candidatos inscritos
-- Um candidato pertence a uma vaga (candidato.vaga_id -> vaga.id)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS candidato (
    id      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome    VARCHAR(100) NOT NULL,
    email   VARCHAR(100),
    vaga_id INT NOT NULL,
    CONSTRAINT fk_candidato_vaga
        FOREIGN KEY (vaga_id) REFERENCES vaga(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Dados de exemplo
-- ------------------------------------------------------------
INSERT INTO vaga (titulo, descricao, requisitos, salario) VALUES
('Desenvolvedor PHP',      'Desenvolver e manter sistemas web', 'PHP, MySQL, Bootstrap', 3500.00),
('Analista de Suporte',    'Atendimento ao usuário interno',    'Informática básica',      2500.00);

INSERT INTO candidato (nome, email, vaga_id) VALUES
('João da Silva',  'joao@email.com',  1),
('Maria Oliveira', 'maria@email.com', 1),
('Carlos Souza',   'carlos@email.com',2);