<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include('header.php');
    ?>
    <h2>Carrinho de Compras</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
                <li>Produto ID: <?php echo $productId; ?>, Quantidade: <?php echo $quantity; ?></li>
            <?php endforeach; ?>
        </ul>
        <form action="index.php?action=cart" method="POST">
            <button type="submit">Finalizar Compra</button>
        </form>
    <?php else: ?>
        <p>Seu carrinho está vazio!</p>
    <?php endif; ?>
</body>
</html>