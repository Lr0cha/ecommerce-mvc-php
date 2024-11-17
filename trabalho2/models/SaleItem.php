<?php
require_once('./database/Database.php');

class SaleItem extends Database {
    private $table = 'sale_items';
    
    private $sale_id;
    private $product_id;
    private $quantity;
    private $price;

    public function __construct($sale_id,$product_id,$quantity,$price) {
        parent::__construct();
        $this->sale_id = $sale_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    // Adiciona um item à venda no BD
    public function addItemToSale() {
        $query = "INSERT INTO " . $this->table . " (sale_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$this->sale_id, $this->product_id, $this->quantity, $this->price]);
    }
}
