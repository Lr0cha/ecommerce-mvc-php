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
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <h5>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h5>

                <form method="POST">
                    <button type="submit" name="confirm_checkout" class="btn btn-success">
                        Confirmar Compra
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
