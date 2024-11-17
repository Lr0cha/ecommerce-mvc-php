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
        
        header('Location: index.php?action=catalog&section='.$_GET['category']);
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
        // Verifica se o carrinho está vazio
        if (empty($_SESSION['cart'])) {
            header('Location: index.php?action=cart&function=showCart');
            exit;
        }
    
        // Usuário que está logado
        $userId = $_SESSION['user']['id'];
    
        $total = 0;
        $productModel = new Product(); // Instância para buscar os detalhes do produto no BD
    
        foreach ($_SESSION['cart'] as $productId => $product) {
            $productDetails = $productModel->getProductDetails($productId); //info dos prod do carrinho
            $price = $productDetails['price'];
            $total += $price * $product['quantity']; // total da compra do carrinho
        }
    
        // antes de mandar p/ BD confirma as informações
        include './views/checkout.php';
    
        // usuário confirmou a compra?
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_checkout'])) {
            $sale = new Sale($userId, $total);
            $saleId = $sale->createSale(); // Cria a venda na tabela sales
    
            // Adiciona os itens do carrinho à tabela sale_items
            foreach ($_SESSION['cart'] as $productId => $product) {
                $productDetails = $productModel->getProductDetails($productId);
                $price = $productDetails['price'];
                $saleItem = new SaleItem($saleId, $productId, $product['quantity'], $price);
                $saleItem->addItemToSale(); // Insere o item na tabela sale_items
            }
    
            // Limpa o carrinho após a compra
            unset($_SESSION['cart']);
            
            // Redireciona para home
            header('Location: index.php?action=home');
            exit;
        }
    }     
}
?>