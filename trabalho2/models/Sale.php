<?php
require_once('./database/Database.php');
class Sale extends Database {
    private $table = 'sales';
    
    private $id;
    private $user_id;
    private $sale_date;
    private $total;

    public function __construct($user_id,$total) {
        parent::__construct();
        $this->user_id = $user_id;
        $this->total = $total;
    }

    public function createSale() {
        $query = "INSERT INTO " . $this->table . " (user_id, total) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$this->user_id, $this->total]);
        
        // Retorna o ID da venda criada
        return $this->pdo->lastInsertId();
    }
}
