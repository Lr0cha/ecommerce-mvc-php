<?php
require_once('./database/Database.php');
class Sale extends Database{
    private $table = 'sales';

    public $id;
    public $user_id;
    public $sale_date;

    public function __construct() {
        parent::__construct();
    }

    public function createSale() {
        $query = "INSERT INTO " . $this->table . " (user_id) VALUES (?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$this->user_id]);
        return $this->pdo->lastInsertId();
    }
}
?>