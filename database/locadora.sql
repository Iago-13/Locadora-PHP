CREATE DATABASE IF NOT EXISTS locadora;
USE locadora;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(20),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    placa VARCHAR(10) NOT NULL UNIQUE,
    disponivel BOOLEAN DEFAULT TRUE,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS locacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_veiculo INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    valor_total DECIMAL(10,2) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_veiculo) REFERENCES veiculos(id) ON DELETE CASCADE
);

INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento) VALUES
('Administrador', 'admin@locadora.com', '$2y$10$XQeX63BP8NhwNU6ZRe1jMeDMI8mJ6VEMhOdOS9s/NXZSzZfYo3nZa', '00000000000', '1990-01-01'),
('Cliente Teste', 'cliente@locadora.com', '$2y$10$XQeX63BP8NhwNU6ZRe1jMeDMI8mJ6VEMhOdOS9s/NXZSzZfYo3nZa', '11111111111', '1995-05-15');

INSERT INTO veiculos (marca, modelo, ano, placa, disponivel) VALUES
('Fiat', 'Uno', 2020, 'AAA1A11', 1),
('Volkswagen', 'Gol', 2019, 'BBB2B22', 1),
('Chevrolet', 'Onix', 2021, 'CCC3C33', 1),
('Hyundai', 'HB20', 2022, 'DDD4D44', 1),
('Renault', 'Kwid', 2020, 'EEE5E55', 1),
('Ford', 'Ka', 2018, 'FFF6F66', 1),
('Toyota', 'Etios', 2019, 'GGG7G77', 1),
('Honda', 'Fit', 2020, 'HHH8H88', 1),
('Peugeot', '208', 2021, 'III9I99', 1),
('Nissan', 'March', 2017, 'JJJ0J00', 1),
('Volkswagen', 'Voyage', 2020, 'KKK1K11', 1),
('Fiat', 'Argo', 2021, 'LLL2L22', 1),
('Chevrolet', 'Prisma', 2019, 'MMM3M33', 1),
('Hyundai', 'Creta', 2022, 'NNN4N44', 1),
('Renault', 'Sandero', 2018, 'OOO5O55', 1),
('Ford', 'EcoSport', 2020, 'PPP6P66', 1),
('Toyota', 'Yaris', 2021, 'QQQ7Q77', 1),
('Honda', 'Civic', 2019, 'RRR8R88', 1),
('Jeep', 'Renegade', 2022, 'SSS9S99', 1),
('Nissan', 'Kicks', 2020, 'TTT0T00', 1);
