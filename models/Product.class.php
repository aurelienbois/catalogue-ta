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

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }
    public function getPrice() { return $this->price; }
    public function setPrice($price) { $this->price = $price; }
    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }
    public function getCategory() { return $this->category; }
    public function setCategory($category) { $this->category = $category; }
}