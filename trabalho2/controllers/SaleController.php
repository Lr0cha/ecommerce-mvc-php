<?php
require_once('./models/Sale.php');
class SaleController {
    public function showCart() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = []; //criar cart na sessão 
        }
        include './views/cart.php';
    }

    public function addToCart() {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 0;
        }

        $_SESSION['cart'][$productId] += $quantity;

        header('Location: index.php?action=home');
        exit;
    }

    public function checkout() {
        // Finalizar a compra, criando venda e itens
        include './views/checkout.php';
    }
}
?>