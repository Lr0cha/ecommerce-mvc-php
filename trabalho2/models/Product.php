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

    public function searchProducts($query) {
        $sql = "SELECT * FROM products WHERE description LIKE :query LIMIT 5"; // Limitando as sugestões
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['query' => '%'.$query.'%']);
        return $stmt->fetchAll(); // retorna as que tem os caracteres da busca
    }

    public function getProductDetails($productId) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch();
    }

    public function withdrawItem($id,$quantitySold){
        $stmt = $this->pdo->prepare("SELECT stock_quantity FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $currentQuantity = $stmt->fetchColumn();
        $newQuantity = $currentQuantity - $quantitySold;

        $stmt = $this->pdo->prepare("UPDATE products SET stock_quantity = ? WHERE id = ?");
        $stmt->execute([$newQuantity, $id]);
    }
}
?>