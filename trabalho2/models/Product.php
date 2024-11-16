<?php
require_once('./database/Database.php');
class Product extends Database {
    private $table = 'products';

    public $id;
    public $code;
    public $description;
    public $unit;
    public $stock_quantity;
    public $price;
    public $category;
    public $image;

    public function __construct() {
        parent::__construct();
        $this->table = 'products';
    }

    public function getAllProducts() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // array associativo
    }

    public function getProductsByCategory($category) {
        $query = "SELECT * FROM " . $this->table . " WHERE category = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // array associativo
    }
}
?>
