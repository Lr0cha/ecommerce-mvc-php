<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Login</title>
</head>
<body>

<div class="container">
    <div class="client-login">
        <h1 class="title-forms">Tela de login</h1>
        <form method="POST" action="index.php?action=login">
            <div class="form-login">
                <div class="text-field">
                    <label for="text_email">E-mail*</label>
                    <input type="email" id="text_email" name="email" required>
                </div>
                <div class="text-field">
                    <label for="text_password">Senha*</label>
                    <input type="password" id="text_password" name="password" required>
                </div>
                <div class="btn-forms">
                    <input type="submit" value="Entrar">
                </div>
                <div class="link-register">
                    <a href="index.php?action=register">Ainda não tem uma conta? Cadastre-se aqui</a>
                </div>
            </div>
        </form>

        <?php
            if (isset($_SESSION['error_message'])) {
                echo "<script type='text/javascript'>
                        alert('" . addslashes($_SESSION['error_message']) . "');
                        </script>";
                unset($_SESSION['error_message']);
            }
        ?>
    </div>
</div>
</body>
</html>

