<?php
require_once('./database/Database.php');
class Sale extends Database {
    private $table = 'sales';
    
    private $id;
    private $user_id;
    private $sale_date;
    private $address;
    private $numberAddress;
    private $total;

    public function __construct($user_id,$total,$address,$numberAddress) {
        parent::__construct();
        $this->user_id = $user_id;
        $this->total = $total;
        $this->address = $address;
        $this->numberAddress = $numberAddress;
    }

    public function createSale() {
        $query = "INSERT INTO " . $this->table . " (user_id, total, delivery_address, number_address) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$this->user_id, $this->total, $this->address, $this->numberAddress]);
        
        // Retorna o ID da venda criada
        return $this->pdo->lastInsertId();
    }
}
