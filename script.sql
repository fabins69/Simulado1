CREATE DATABASE IF NOT EXISTS revisao_ferramenta;
USE revisao_ferramenta;


CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);


CREATE TABLE produtos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    valor DECIMAL(8,2) NOT NULL,
    qtd_estoque INT NOT NULL,
    qtd_minima INT NOT NULL,
    data_valid DATE NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);


CREATE TABLE movimentacaos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quantidade INT NOT NULL,
    data_movimentacao DATE NOT NULL,
    tipo ENUM('entrada', 'saida') NOT NULL,

    produto_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED NOT NULL,

    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    CONSTRAINT fk_movimentacao_produto
        FOREIGN KEY (produto_id)
        REFERENCES produtos(id),

    CONSTRAINT fk_movimentacao_usuario
        FOREIGN KEY (user_id)
        REFERENCES users(id)
);