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
    <h1>Listagem de Produtos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Unidade</th>
                <th>Quantidade em Estoque</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['unit']; ?></td>
                    <td><?php echo $product['stock_quantity']; ?></td>
                    <td>R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>