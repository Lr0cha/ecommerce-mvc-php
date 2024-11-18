<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php?action=home"><img id="img_logo" src="./assets/img/decoracaoLogo.png" alt="Logo Decora Fácil" style="max-height: 50px;"></a>
        </div>
        <div class="search d-flex position-relative"> 
            <input type="text" id="search-input" class="form-control me-2" placeholder="Pesquisar decoração...">
            <!-- sugestões de pesquisa -->
            <div id="search-suggestions" class="position-absolute bg-white shadow rounded w-100 mt-5 text-dark" style="display:none;"></div>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['user'])) { // variável está declarada e <> de null
                $numProdCart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; //quantidade de prod. no carrinho            
                $nomes = explode(' ', $_SESSION['user']['name']);
                echo "<span class='text-white'>Olá, " . htmlspecialchars($nomes[0]) . "</span>";
                echo "<a href='index.php?action=logout' class='text-white ms-3'>Sair</a>";
                echo "<a href='index.php?action=cart&function=showCart' class='btn btn-primary text-white ms-3'>
                        <i class='fa-solid fa-cart-shopping'></i> 
                        Carrinho 
                        <span class='badge bg-light text-dark ms-2'>$numProdCart</span>
                      </a>";
            } else {
                echo "<a href='index.php?action=login' class='btn btn-primary text-white'>Login</a>";
            }
            ?>
        </div>
    </div>
</header>

<!-- jQuery p/ manipulação AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Quando o usuário digitar na pesquisa
    $('#search-input').on('input', function() {
        var query = $(this).val(); // valor digitado
        
        if (query.length > 2) { // busca após 3 caracteres
            $.ajax({
                url: 'index.php?action=search',
                method: 'GET',
                data: { query: query },
                success: function(response) {
                    $('#search-suggestions').html(response).show(); // Exibe as sugestões
                }
            });
        } else {
            // Se não houver pesquisa, esconda as sugestões
            $('#search-suggestions').hide();
        }
    });

    // Quando o usuário clicar em uma sugestão da busca
    $(document).on('click', '.suggestion-item', function() {
        var category = $(this).data('category');
        window.location.href = 'index.php?action=catalog&section=' + category; // Redireciona para a categoria
    });

    // Esconde as sugestões ao clicar fora da div de busca
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search').length) {
            $('#search-suggestions').hide();
        }
    });
});
</script>
