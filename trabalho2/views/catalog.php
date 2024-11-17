<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <?php
        include('header.php');
    ?>
    <div class="container my-5">
        <h1 class="text-center text-primary">Catálogo de Produtos</h1>
        <p class="text-center text-muted">Encontre os melhores produtos para sua decoração!</p>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 pb-3">
            <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img src="./assets/img/<?php echo $product['category']."/". $product['image']; ?>" alt="<?php echo $product['description']; ?>" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['description']; ?></h5>
                            <p class="card-text text-success">
                                Preço: R$ <?php echo number_format($product['price'], 2, ',', '.'); ?>
                            </p>
                            <p class="card-text text-muted">Estoque: <?php echo $product['stock_quantity']; ?> unidades</p>
                            <form action="index.php?action=cart&function=addToCart" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <div class="d-flex align-items-center">
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock_quantity']; ?>" class="form-control me-2" required>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-cart-plus"></i> Adicionar ao Carrinho
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <?php
        include('footer.php');
    ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
