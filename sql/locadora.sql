CREATE DATABASE locadora;
USE locadora;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(255)
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    placa VARCHAR(20) UNIQUE NOT NULL,
    ano INT NOT NULL,
    disponivel ENUM('Sim','Não') DEFAULT 'Sim'
);

CREATE TABLE locacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    veiculo_id INT,
    data_inicio DATE,
    data_fim DATE,
    valor_total DECIMAL(10,2),
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (veiculo_id) REFERENCES veiculos(id)
);
