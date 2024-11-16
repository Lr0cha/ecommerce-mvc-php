<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decora Fácil - Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <img id="img_logo" src="./assets/img/decoracaoLogo.png" alt="Logo Decora Fácil" style="max-height: 50px;">
            <a id="logo" class="text-white fs-3 ms-2">Decora Fácil</a>
        </div>
        <div class="search d-flex">
            <input type="text" class="form-control me-2" placeholder="Pesquisar decoração...">
            <button class="btn btn-primary">Buscar</button>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['user'])) { // variável está declarada e <> de null
                $nomes = explode(' ', $_SESSION['user']['name']);
                echo "<span class='text-white'>Olá, " . htmlspecialchars($nomes[0]) . "</span>";
                echo "<a href='index.php?action=logout' class='text-white ms-3'>Sair</a>";
                echo "<a href='#' class='btn btn-primary text-white ms-3'><i class='fa-solid fa-cart-shopping'></i> Carrinho</a>";
            } else {
                echo "<a href='index.php?action=login' class='btn btn-primary text-white'>Login</a>";
            }
            ?>
        </div>
    </div>
</header>

<nav class="bg-light py-2">
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item"><a href="#" class="nav-link active">Quadros</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Luminárias</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Almofadas</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Vasos</a></li>
        </ul>
    </div>
</nav>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="hero-text">
                <h1 class="display-4">Transforme Sua Casa com Estilo</h1>
                <p class="lead">Descubra os melhores produtos de decoração para criar o ambiente dos seus sonhos. Qualidade, estilo e conforto para cada canto da sua casa.</p>
                <a href="index.php?action=register" class="btn btn-success"><i class="fa-solid fa-link"></i> Cadastrar-se</a>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
        <div class="col">
            <div class="card">
                <img src="./assets/img/quadros.jpg" alt="Quadros decorativos para salas e escritórios" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">"Decore suas paredes com quadros e pôsteres exclusivos e modernos."</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./assets/img/luminaria.jpg" alt="Luminárias decorativas" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">"Adicione luz e charme ao seu espaço com luminárias sofisticadas."</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./assets/img/almofadas.jpg" alt="Almofadas e cortinas" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">"Almofadas e cortinas para dar aquele toque de aconchego e estilo."</p>
                </div>
            </div>
        </div>
    </div>
    <?php
            if (isset($_SESSION['error_message'])) {
                echo "<script type='text/javascript'>
                        alert('" . addslashes($_SESSION['error_message']) . "');
                        </script>";
                unset($_SESSION['error_message']);
            }
        ?>
</div>

<footer class="bg-dark text-white text-center py-3">
    <p>Decora Fácil &copy; 2024 - Todos os direitos reservados.</p>
</footer>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>