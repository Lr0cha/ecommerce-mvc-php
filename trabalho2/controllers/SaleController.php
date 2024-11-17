<?php
require_once('./models/Sale.php');
class SaleController {
    public function showCart() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = []; //criar cart na sessão 
        }
        include './views/cart.php';
    }

    public function addToCart($nameProd) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        // o prod já está no carrinho?
        if (!isset($_SESSION['cart'][$productId])) {
            // Se não estiver, cria
            $_SESSION['cart'][$productId] = [
                'quantity' => 0,
                'name' => $nameProd
            ];
        }
    
        $_SESSION['cart'][$productId]['quantity'] += $quantity; //add qtd
        
        header('Location: index.php?action=home');
        exit;
    }    

    public function removeItemCart($id) {
        if (isset($_SESSION['cart'])) {
            // produto existe no carrinho?
            if (isset($_SESSION['cart'][$id])) {
                // Remove do carrinho
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: index.php?action=cart&function=showCart');
        exit();
    }

    public function checkout() {
        // Finalizar a compra, criando venda e itens
        include './views/checkout.php';
    }
}
?>