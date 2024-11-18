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

    public function searchAction($query) {
        if ($query) {
            $products = $this->model->searchProducts($query);
    
            if ($products) {
                foreach ($products as $product) {
                    echo "<div class='suggestion-item p-2' data-category='" . htmlspecialchars($product['category']) . "'>
                            <strong>" . htmlspecialchars($product['description']) . "</strong> - " . 
                            "R$ " . number_format($product['price'], 2, ',', '.') . "
                        </div>"; // add na busca
                }
            } else {
                echo "<div class='p-2'>Nenhum produto encontrado.</div>";
            }
        }
    }
}    
?>