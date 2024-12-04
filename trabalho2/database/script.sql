CREATE DATABASE ecommerce;
USE ecommerce;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    birth_date DATE,
    address TEXT
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    unit VARCHAR(50) NOT NULL,
    stock_quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(100) NOT NULL,
    image VARCHAR(255) NOT NULL
);

CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    delivery_address TEXT,
    number_address INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE sale_items (
    id INT AUTO_INCREMENT PRIMARY KEY,              
    sale_id INT NOT NULL,                        
    product_id INT NOT NULL,                         
    quantity INT NOT NULL,                          
    price DECIMAL(10, 2) NOT NULL,                   
    FOREIGN KEY (sale_id) REFERENCES sales(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- inserindo produtos que estão no assets
insert into products (code,description,unit,stock_quantity,price,category,image) values
('P22735','Luminaria cinza','unidade',90,39.99,'luminaires','luminaria1.jpg'),
('P22731','Luminaria pendente','unidade',180,45.99,'luminaires','luminaria5.jpg'),
('P22810','Abajur de cabeceira','unidade',70,55.99,'luminaires','abajur2.jpg'),
('P22920','Luminaria pendente branca','unidade',300,29.99,'luminaires','luminaria3.jpg'),
('P23810','Luminaria pendente preto','unidade',62,39.99,'luminaires','luminaria4.jpg');

insert into products (code,description,unit,stock_quantity,price,category,image) values
('P32735','Cortina bege 3,20 x 2,40 m','unidade',90,70.99,'curtains','cortinaBege.jpg'),
('P32731','Cortina branca 3,00 x 2,20 m','unidade',180,85.99,'curtains','cortinaBranco.jpg'),
('P32810','Cortina preta 2,80 x 2,10 m','unidade',100,65.99,'curtains','cortinaPreta1.jpg'),
('P32920','Cortina preta com listras 2,20m 1,60m','unidade',300,49.99,'curtains','cortinaPreta.jpg'),
('P33810','Cortina com lantejola 3,20 x 2,60 m ','unidade',62,109.99,'curtains','cortinaLantejola.jpg');

INSERT INTO products (code, description, unit, stock_quantity, price, category, image) VALUES
('P12345', 'Vaso branco pequeno', 'unidade', 100, 45.00, 'vase', 'vasoFloresBranco.jpg'),
('P12735', 'Vaso minimalista de madeira', 'unidade', 78, 39.00, 'vase', 'vasoFloresMarrom.jpg'),
('P12810', 'Vaso de cerâmica marrom', 'unidade', 120, 55.00, 'vase', 'jarroCeramicaMarrom.jpg'),
('P12915', 'Vaso pequeno de vidro', 'unidade', 200, 39.99, 'vase', 'vasoVidro.jpg'),
('P19135', 'Jarro minimalista de vidro', 'unidade', 20, 19.99, 'vase', 'jarroVidro.jpg');

INSERT INTO products (code, description, unit, stock_quantity, price, category, image) VALUES
('P42345', 'Quadro 40 x 60 cm Abacaxi', 'unidade', 15, 44.99, 'frame', 'frame2.jpg'),
('P42735', 'Quadro 90 x 120 cm', 'unidade', 50, 59.99, 'frame', 'frame1.jpg'),
('P42810', 'Moldura 40 x 30 cm', 'unidade', 120, 33.99, 'frame', 'frame3.jpg'),
('P42915', 'Moldura 30 x 40 cm', 'unidade', 92, 31.99, 'frame', 'frame4.jpg'),
('P49135', 'Quadro 40 x 60 cm', 'unidade', 200, 39.99, 'frame', 'frame5.jpg');