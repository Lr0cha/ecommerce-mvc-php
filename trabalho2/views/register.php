<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Cadastro</title>
</head>
<body>

<div class="container">
    <div class="client-register">
        <h1 class="title-forms">Cadastro de usuário</h1>
        <form id="registerForm" method="POST" action="index.php?action=register">
            <div class="form-register">
                <div class="text-field">
                    <label for="text_name">Nome*</label>
                    <input type="text" id="text_name" name="name" required>
                </div>
                <div class="text-field">
                    <label for="text_email">E-mail*</label>
                    <input type="email" id="text_email" name="email" required>
                    <span class="error-message" id="error_email"></span>
                </div>
                <div class="text-field">
                    <label for="text_cpf">CPF*</label>
                    <input type="text" id="text_cpf" name="cpf" oninput="cpfMask(this)" maxlength="11" onblur="cpfMask(this)" required>
                    <span class="error-message" id="error_cpf"></span>
                </div>
                <div class="text-field">
                    <label for="text_password">Senha*</label>
                    <input type="password" id="text_password" name="password" minlength="6" required>
                    <span class="error-message" id="error_password"></span>
                </div>
                <div class="text-field">
                    <label for="text_phone">Celular*</label>
                    <input type="tel" id="text_phone" name="phone" onkeyup="handlePhone(event)" maxlength="15" required>
                    <span class="error-message" id="error_phone"></span>
                </div>
                <div class="text-field">
                    <label for="text_birthday">Nascimento*</label>
                    <input type="date" id="text_birthday" name="birth" required>
                    <span class="error-message" id="error_birthday"></span>
                </div>
                <div class="text-field">
                    <label for="text_cep">CEP*</label>
                    <input type="text" id="text_cep" name="cep" maxlength="9" onblur="checkCep()" required>
                    <span class="error-message" id="error_cep"></span>
                </div>
                <div class="text-field">
                    <label for="text_address">Endereço*</label>
                    <input type="text" id="text_address" name="address" required readonly>
                </div>
                <div class="btn-forms">
                    <input type="submit" value="Cadastrar">
                </div>
            </div>
            <div class="link-register">
                <a href="index.php?action=login">Já tem uma conta? Entre aqui</a>
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
<script src="./assets/js/script.js"></script>
</body>
</html>
