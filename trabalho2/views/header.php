<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php?action=home"><img id="img_logo" src="./assets/img/decoracaoLogo.png" alt="Logo Decora Fácil" style="max-height: 50px;"></a>
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