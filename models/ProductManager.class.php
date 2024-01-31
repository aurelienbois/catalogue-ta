<?php
require_once('models/Model.class.php');
require_once('models/Product.class.php');

class ProductManager extends Model {
    private $products = [];

    public function getProducts() {
        return $this->products;
    }

    public function addProduct(Product $product) {
        $pdo = $this->getBdd();
        $stmt = $pdo->prepare("INSERT INTO products (id, name, description, price, image, category) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $product->getId());
        $stmt->bindValue(2, $product->getName());
        $stmt->bindValue(3, $product->getDescription());
        $stmt->bindValue(4, $product->getPrice());
        $stmt->bindValue(5, $product->getImage());
        $stmt->bindValue(6, $product->getCategory());
        $stmt->execute();
    }

    public function getProductsFromDb() {
        $this->products = [];
        $req = $this->getBdd()->prepare('SELECT * FROM products');
        $req->execute();
        $products = $req->fetchAll(PDO::FETCH_ASSOC); 

        foreach ($products as $p) {
            $this->products[] = new Product(
                $p['id'],
                $p['name'],
                $p['description'],
                $p['price'],
                $p['image'],
                $p['category']
            );
        }

        return $this->products;
    }

    public function getProduct($id) {
        $pdo = $this->getBdd();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function updateProduct($id, Product $product) {
        $pdo = $this->getBdd();
        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ?, category = ? WHERE id = ?");
        $stmt->bindValue(1, $product->getName());
        $stmt->bindValue(2, $product->getDescription());
        $stmt->bindValue(3, $product->getPrice());
        $stmt->bindValue(4, $product->getImage());
        $stmt->bindValue(5, $product->getCategory());
        $stmt->bindValue(6, $id);
        $stmt->execute();
    }

    public function deleteProduct($id) {
        $pdo = $this->getBdd();
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}