<?php
require_once('./models/Product.php');

class ProductController {
    private $model;
    
    public function __construct() {
        $this->model = new Product();
    }

    public function showCatalog($category) {
        $products = $this->model->getProductsByCategory($category);
        include './views/catalog.php';
    }

    public function listAll() {
        $products = $this->model->getAllProducts();
        include './views/list.php';
    }
}
?>