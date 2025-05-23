CREATE DATABASE IF NOT EXISTS projeto_vida;
USE projeto_vida;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255),
    data_nascimento DATE,
    sobre_mim TEXT,
    foto_perfil VARCHAR(255),
    quem_sou_eu TEXT,
    lembrancas TEXT,
    pontos_fortes TEXT,
    pontos_fracos TEXT,
    valores TEXT,
    aptidoes TEXT,
    relacionamentos TEXT,
    dia_a_dia TEXT,
    vida_escolar TEXT,
    visao_sobre_mim TEXT,
    visao_dos_outros TEXT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
