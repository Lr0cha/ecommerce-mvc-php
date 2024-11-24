<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center text-primary">Revisão do Pedido</h2>

        <div class="row">
            <div class="col-md-8">
                <h4>Resumo do Carrinho</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Exibe os itens do carrinho
                        $total = 0;
                        $productModel = new Product(); //instanciar model do produto
                        foreach ($_SESSION['cart'] as $productId => $product):
                            $productDetails = $productModel->getProductDetails($productId);
                            $price = $productDetails['price'];
                            $itemTotal = $price * $product['quantity'];
                            $total += $itemTotal;
                        ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td>R$ <?php echo number_format($price, 2, ',', '.'); ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td>R$ <?php echo number_format($itemTotal, 2, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; 
                        $_SESSION['total'] = $total; // guardar total para a função checkout
                        ?>
                    </tbody>
                </table>
                <h6 class="text-success">*Frete grátis</h6>
                <h5>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h5>
                <form method="POST" action="index.php?action=checkout">
                    <div id="address_fields">
                        <h5>Informe endereço para entrega (caso seja diferente do cadastrado):</h5>
                        <div class="address">
                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="text_cep" name="cep" maxlength="9" onblur="checkCep()" placeholder="Digite um CEP caso o endereço seja diferente do cadastrado">
                            </div>
                            <div class="mb-3">
                                <label for="text_address">Endereço</label>
                                <input type="text" class="form-control" id="text_address" name="text_address" readonly>
                            </div>
                            <input type="hidden" name="address_type" value="<?php echo $_SESSION['user']['address']?>"> <!-- Default para "endereço de cadastro" -->
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5>Informe número da residência:</h5>
                        <label for="number" class="form-label">Número</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="Digite o número da residência" required>
                    </div>
                        <input type="submit" name="confirm_checkout" class="btn btn-success" value="Confirmar Compra">
                </form>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
