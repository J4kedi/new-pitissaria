-- Derrubando banco de dados
DROP DATABASE IF EXISTS pizzaria_db;

-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS pizzaria_db;
USE pizzaria_db;

-- Tabela de ingredientes
CREATE TABLE IF NOT EXISTS ingredientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    preco DECIMAL(8,2) NOT NULL,
    data_entrada DATE NOT NULL,
    data_validade DATE NOT NULL
);

-- Tabela de endereços
CREATE TABLE IF NOT EXISTS enderecos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    num_res VARCHAR(4) NOT NULL,
    cidade VARCHAR(50) NOT NULL
);

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    tipo_usuario ENUM('cliente', 'pizzaiolo', 'gerente') DEFAULT 'cliente',
    endereco_id INT,
    data_nascimento DATE,
    celular VARCHAR(20),
    username VARCHAR(50),
    FOREIGN KEY (endereco_id) REFERENCES enderecos(id) -- Referencia a coluna id da tabela enderecos
);

-- Tabela de pizzas personalizadas
CREATE TABLE IF NOT EXISTS pizzas_personalizadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(8,2) NOT NULL,
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) -- Restrição de chave estrangeira com a tabela usuarios
);

-- Tabela de ingredientes das pizzas personalizadas
CREATE TABLE IF NOT EXISTS ingredientes_pizzas_personalizadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pizza_personalizada INT,
    id_ingrediente INT,
    quantidade INT,
    FOREIGN KEY (id_pizza_personalizada) REFERENCES pizzas_personalizadas(id), -- Restrição de chave estrangeira com a tabela pizzas_personalizadas
    FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id) -- Restrição de chave estrangeira com a tabela ingredientes
);

-- Tabela de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    data_pedido DATE,
    total DECIMAL(8,2) NOT NULL,
    endereco_entrega_id INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (endereco_entrega_id) REFERENCES enderecos(id)
);

-- Tabela de itens do pedido para pizzas personalizadas
CREATE TABLE IF NOT EXISTS itens_pedido_personalizadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_pizza_personalizada INT,
    quantidade INT,
    preco_unitario DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (id_pizza_personalizada) REFERENCES pizzas_personalizadas(id)
);

-- Inserção de dados de exemplo
INSERT INTO ingredientes (nome, preco, data_entrada, data_validade) VALUES
    ('Molho de Tomate', 2.50, '2022-04-01', '2022-10-01'),
    ('Queijo Mussarela', 3.00, '2022-04-01', '2022-10-01'),
    ('Pepperoni', 4.00, '2022-04-01', '2022-10-01'),
    ('Cogumelos', 2.50, '2022-04-01', '2022-10-01'),
    ('Pimentão', 1.50, '2022-04-01', '2022-10-01'),
    ('Cebola', 1.00, '2022-04-01', '2022-10-01'),
    ('Azeitonas', 1.50, '2022-04-01', '2022-10-01');

select * from usuarios;
delete from usuarios where id = 3;

select * from pizzas_personalizadas;
select * from ingredientes_pizzas_personalizadas;
-- Select para a tabela de pedidos
SELECT * FROM pedidos;