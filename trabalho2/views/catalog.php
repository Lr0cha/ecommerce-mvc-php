<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include('header.php');
    ?>
    <h1>Catálogo de Produtos</h1>
    <div class="container">
        <?php foreach ($products as $product): ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="./assets/img/<?php echo $product['image']; ?>" alt="<?php echo $product['description']; ?>" class="img-fluid">
                    <h3><?php echo $product['description']; ?></h3>
                    <p>Preço: R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
                    <p>Estoque: <?php echo $product['stock_quantity']; ?></p>
                    <form action="index.php?action=cart&function=addToCart" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock_quantity']; ?>" required>
                        <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>