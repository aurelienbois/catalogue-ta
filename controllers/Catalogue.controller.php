<?php
class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $category;

    public function __construct($id, $name, $description, $price, $image, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
    }


}

class ProductManager {
    
}

class CatalogueController {
    private $productManager;

    public function __construct() {
        $this->productManager = new ProductManager();
    }

    public function displayProducts() {
        $products = $this->productManager->getProductsFromDb();
        require_once('views/blog.view.php');
    }

    public function create() {
        include('views/crud/product_create.view.php');
    }

    public function store() {
        var_dump($_POST);
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $category = $_POST['category'];

        $product = new Product($id, $name, $description, $price, $image, $category);
        $this->productManager->addProduct($product);

        header('Location: index.php');
    }
}