<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="d-flex flex-column min-vh-100">
    <?php
        include('header.php');
    ?>

    <div class="container my-5">
        <h2 class="text-center text-primary">Carrinho de Compras</h2>

        <?php if (!empty($_SESSION['cart'])): ?>
            <div class="list-group">
                <?php foreach ($_SESSION['cart'] as $productId => $details): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Produto: <?php echo $details['name']; ?>, 
                        Quantidade: <?php echo $details['quantity']; ?>
                        
                        <form method="POST" action="index.php?action=cart&id=<?php echo $productId; ?>&function=removeItemCart">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Remover
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <form action="index.php?action=cart" method="POST">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Finalizar Compra
                    </button>
                </form>
                <a href="index.php?action=home" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar à tela principal
                </a>
            </div>

        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert">
                Seu carrinho está vazio!
            </div>
        <?php endif; ?>
    </div>
    <?php
        include('footer.php');
    ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
