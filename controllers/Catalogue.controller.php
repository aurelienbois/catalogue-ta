<?php

require_once('models/Product.class.php');
require_once('models/ProductManager.class.php');


class CatalogueController {
    private $productManager;

    public function __construct() {
        $this->productManager = new ProductManager();
    }

    public function displayProducts() {
        $products = $this->productManager->getProductsFromDb();
        include('views/crud/product_list.view.php');
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