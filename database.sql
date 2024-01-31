CREATE TABLE products ( id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255) NOT NULL, description TEXT, price DECIMAL(10,2), image VARCHAR(255), category VARCHAR(255) );

INSERT INTO products (name, description, price, image, category) VALUES
('Produit 1', 'Description du produit 1', 10.99, 'image1.jpg', 'Catégorie 1'),
('Produit 2', 'Description du produit 2', 20.99, 'image2.jpg', 'Catégorie 2'),
('Produit 3', 'Description du produit 3', 30.99, 'image3.jpg', 'Catégorie 3');