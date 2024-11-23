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

    public function checkout(){   
        $userId = $_SESSION['user']['id']; //id usuario atual   
        $productModel = new Product(); //instanciar model do produto
        $total = $_SESSION['total'];
        unset($_SESSION['total']); // destruir dps de utilizada

        if (isset($_POST['text_address'])) {
            $address = $_POST['text_address']; // novo endereço se selecionado
        }else{
            $address = $_POST['address_type']; // endereço do cadastro
        } 
        $numberAddress = $_POST['number']; // número residência

        // Criação da venda
        $sale = new Sale($userId, $total, $address, $numberAddress);
        $saleId = $sale->createSale();

        // Adiciona os itens do carrinho à tabela sale_items
        foreach ($_SESSION['cart'] as $productId => $product) {
            $productDetails = $productModel->getProductDetails($productId);
            $price = $productDetails['price'];
            $saleItem = new SaleItem($saleId, $productId, $product['quantity'], $price);
            $saleItem->addItemToSale();
            $productModel->withdrawItem($productId,$product['quantity']); // retirar item que foram vendidos
        }

        // Limpa o carrinho após a compra
        unset($_SESSION['cart']);

        header('Location: index.php?action=home');
        exit;
    }
}
?>